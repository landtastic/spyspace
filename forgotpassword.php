<?
include 'db.php';

error_reporting(E_ALL ^ E_NOTICE);

$email = htmlspecialchars($_POST['email']);
$sentto = htmlspecialchars($_GET['sentto']);

if ($_POST['subm']) {
	if (preg_match('/(^[0-9a-zA-Z_\.-]{1,}@[0-9a-zA-Z_\-]{1,}\.[0-9a-zA-Z_\-]{2,}$)/',$email) == false) exit("<b>$email</b> does not appear to be a valid email address.  <a href=javascript:history.go(-1)>back</a>");
	
	$check_sql = "SELECT ssusername, email, password FROM users where email='$email'";
	$check_result = mysql_query($check_sql);
	if ($check_result) {
		if (mysql_num_rows($check_result) == 0) exit("email <b>$email</b> doesn't exist in database. <a href=javascript:history.go(-1)>back</a>");
		while ($userdata = mysql_fetch_object($check_result)) {
			$foundusername = $userdata -> ssusername;
			$foundemail = $userdata -> email;
			$foundpassword = $userdata -> password;
		}
	}	
	
	$email = $_REQUEST['email'] ;
	$message = $_REQUEST['message'] ;
	
	mail( $foundemail, "forgotten password", "hi $foundusername.  it's $foundpassword.", "From: spyspace@gmail.com" );
	header( "Location: forgotpassword.php?sentto=$foundemail" );
	exit();
}	
?>
<html>
<head>
<title>spyspace - myspace tracker - forgot password</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
td { font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; color:#666666; }
input { border:1px solid #cccccc; font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; }
A:link,A:visited,A:active { color:#222222; }
A:hover { color:#555555; }
.explain { font-size: 11px; color:#ffffff; }
.explain2 { font-size: 11px; color:#999999; }
.disclaim { font-size: 11px; color:#999999; text-align:left; width:483px; }
.head { font-size:12px; letter-spacing: 5px; }
.bighead { font-size:13px; letter-spacing: 64px; padding-top:50px; padding-bottom:30px; }
.termsbox { width:483px; height:120px; overflow:auto; border:1px solid #cccccc; text-align:left; padding:5px; }
.micro { font-size: 0px; color:#ffffff; visibility:hidden; height:1px;}
</style>
<script language="javascript">
	function focuser() {
		var f = document.fp;
		if (f) f.email.focus();
	}
</script>
</head>
<body bgcolor="#dcdfec" leftmargin="0" topmargin="0" bottommargin="0" rightmargin="0" marginwidth="0" marginheight="0" onLoad="focuser()">

<table width="900" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="89" background="img/border_left.gif"><img src="img/trans.gif" width="89"></td>
    <td align="center" valign="top" bgcolor="#FFFFFF">
		<div class="bighead">&nbsp;spyspace</div><br>
<? if (!$sentto) { ?>		
		<table lign="center" border=0>
		<form name="fp" method="post" action="forgotpassword.php">
			<tr>
				<td align="right">email you signed up with:&nbsp;</td>
				<td><input name="email" type="text" size="20" maxlength="255"></td>
			</tr>
			<tr>
				<td align="right">&nbsp;</td>
			  	<td height="26"><input name="subm" type="submit" value=" click "></td>
			</tr>	
		</form>	
		</table>
<? 
} else {
	echo("password sent to <b>$sentto</b>. check it. <br><br><br><a href=login.php>log in</a>");
}
?>
		</td>
    <td width="89" background="img/border_right.gif"><img src="img/trans.gif" width="89"></td>
  </tr>
</table>

</body>
</html>