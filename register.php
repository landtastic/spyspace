<?php 
if (!$_POST['subm']) header("Location: register.htm");

include 'db.php';

//delete cookie	
setcookie("ui", "", time() - 3600);

$ssusername = $_POST['ssusername'];
$email = $_POST['email'];
$ip = $_SERVER['REMOTE_ADDR'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
//$msuserid = $_POST['msuserid'];
//$msusername = $_POST['msusername'];
$block = 0;
$date_registered = date('Y-m-d H:i:s'); 
$subscribed = 0;

$strerror = '';

if ($password != $password2) $strerror = 'passwords do not match. ';
//if (preg_match('/(^[0-9a-zA-Z_\.-]{1,}@[0-9a-zA-Z_\-]{1,}\.[0-9a-zA-Z_\-]{2,}$)/',$email) == false) $strerror = "<b>$email</b> does not appear to be a valid email address. ";
if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)  == false) $strerror = "<b>$email</b> does not appear to be a valid email address.";
if (strlen($ssusername) > 20) $strerror = 'username is too long. 20 character max. ';
if (preg_match('/^[a-zA-Z0-9_]+$/',$ssusername) == false) $strerror = "<b>$ssusername</b> does not appear to be a valid user name. use only letters, numbers, and underscores. ";
if ($password == '') $strerror = 'password is blank. ';
if (strpos($password,'|') > -1) $strerror = 'don\'t use funny characters in your password. ';
if ($email == '') $strerror = 'email is blank. ';
if ($ssusername == '') $strerror = 'username is blank. ';

	//check if username/email already exists after other checks pass
	if (!$strerror) {
		$check_sql = "select ssusername,email from users where ssusername='$ssusername'";
		$check_result = mysql_query($check_sql);
		$foundusername = '';
		$foundemail = '';
		while ($userdata = mysql_fetch_object($check_result)) {
			$foundusername = $userdata -> ssusername;
			$foundemail = $userdata -> email;
		}
		if (strtolower($foundemail) == strtolower($email)) $strerror = "email <b>$email</b> already exists in the database. maybe you've already registered, or maybe you need to try a different one.";
		if (strtolower($foundusername) == strtolower($ssusername)) $strerror = "username <b>$ssusername</b> already exists in the database. please try a different one. <br><br><a href=login.php?u=$ssusername>log in?</a><br><br><a href=instructions.php?ssusername=$ssusername>need your instructions again?</a><br><br>";
	}	
?>
<html>
<head>
<title>spyspace - myspace tracker - register</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
td { font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; color:#666666; }
.head { font-size:12px; letter-spacing: 5px; }
.bighead { font-size:13px; letter-spacing: 64px; padding-top:50px; padding-bottom:30px; }
.explain2 { font-size: 11px; color:#999999; }
.instruct { font-size: 11px; color:#666666; text-align:left; width:500px; }
xmp { font-family: tahoma, verdana, arial; font-size: 11px; letter-spacing: 1px; border: 1px dashed #666; padding:4px; }
</style>
</head>
<body bgcolor="#dcdfec" leftmargin="0" topmargin="0" bottommargin="0" rightmargin="0" marginwidth="0" marginheight="0">
<table width="900" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="89" background="img/border_left.gif"><img src="img/trans.gif" width="89"></td>
    <td align="center" valign="top" bgcolor="#FFFFFF">
		<div class="bighead">&nbsp;spyspace</div><br>
		<div class="instruct">
<?
	if ($strerror) {
		echo '<span class="head">error:</span><br><br><br>' . $strerror;
		echo ' <a href=javascript:history.go(-1)>try again</a>, or <a href="register.htm">start over</a>';
	} else {
		$sql = "INSERT INTO users (ssusername,email,ip,password,msuserid,msusername,block,date_registered,subscribed) 
			VALUES ('$ssusername','$email','$ip','$password','','','$block',now(),'$subscribed')";
		$result = mysql_query($sql);
		//echo $sql;
		//echo '||'.$result.'||<br><br>';
		
		if ($result == 0) {
			echo "database error.  that username or email might already exist, maybe try another one.  or maybe something else went wrong. <a href='register.htm'>start over</a>";
		} else {
		?>
			<span class="head">registration complete</span><br><br><br>
			<a href="instructions.php?ssusername=<?=$ssusername?>">code installation instructions</a>
		<?
		}
	}
?>
			</div>
		</td>
    <td width="89" background="img/border_right.gif"><img src="img/trans.gif" width="89"></td>
  </tr>
</table>
</body>
</html>