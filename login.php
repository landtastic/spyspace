<?php
include 'db.php';
include 'encrypt.php';

error_reporting(E_ALL ^ E_NOTICE);

//delete cookie	
setcookie("ui", "", time() - 3600);

$u = htmlspecialchars($_GET['u']);
$ssusername = htmlspecialchars($_POST['ssusername']);
$password =  htmlspecialchars($_POST['password']);

if ($_POST['subm']) {
	$check_sql = "SELECT ssusername, password, block, subscribed FROM users where ssusername='$ssusername'";
	$check_result = mysql_query($check_sql);
	if ($check_result) {
		if (mysql_num_rows($check_result) == 0) exit("username <b>$ssusername</b> doesn't exist.");
		while ($userdata = mysql_fetch_object($check_result)) {
			$foundusername = $userdata -> ssusername;
			$foundpassword = $userdata -> password;
			$blocklevel = $userdata -> block;
			$subscribedlevel = $userdata -> subscribed;
		}
		//ssuser added via comment form on victim's page
		if ($blocklevel == 2) exit("account blocked. adding spyspace to the comments of others is disallowed. <br><br> -  spyspace@gmail.com");
		
		if (strtolower($foundpassword) == strtolower($password)) {
			//prepare userinfo cookie
			$userinfo = $ssusername . '||' . $password . '||' . $blocklevel . '||' . $subscribedlevel;
			$enc_userinfo = md5_encrypt($userinfo, $seedword);
			
			if ($subscribedlevel > 0) {
				setcookie("ui",$enc_userinfo,time()+2116800); /* expires in 48 hours */
			} else {
				setcookie("ui",$enc_userinfo,time()+604800); /* expires in 48 hours */
			}	
				
			header("Location: /?u=$ssusername");
			exit();
		} else {
			exit("incorrect password.");
		}
	} else {
		exit( "ERROR: " . mysql_error() );
	}
}
?>
<html>
<head>
<title>spyspace - myspace tracker - log in</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
td { font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; color:#666666; }
input { border:1px solid #cccccc; font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; }
A:link,A:visited,A:active { color:#999999; font-size:11px;}
A:hover { color:#555555; font-size:11px;}
.explain { font-size: 11px; color:#ffffff; }
.explain2 { font-size: 11px; color:#999999; }
.disclaim { font-size: 11px; color:#999999; text-align:left; width:483px; }
.head { font-size:12px; letter-spacing: 5px; }
.foot { font-size: 11px; color:#999999; }
.bighead { font-size:13px; letter-spacing: 64px; padding-top:50px; padding-bottom:30px; }
.termsbox { width:483px; height:120px; overflow:auto; border:1px solid #cccccc; text-align:left; padding:5px; }
.micro { font-size: 0px; color:#ffffff; visibility:hidden; height:1px;}
</style>
<script language="javascript">
	function focuser() {
		var f = document.login;
		if (f.ssusername.value == null || f.ssusername.value == '') {
			f.ssusername.focus();
		} else {
			f.password.focus();
		}
	}
	
	
	function MM_preloadImages() { //v3.0
	  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
		var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
		if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
	}
	
	function MM_swapImgRestore() { //v3.0
	  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
	}
	
	function MM_findObj(n, d) { //v4.01
	  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
		d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
	  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
	  if(!x && d.getElementById) x=d.getElementById(n); return x;
	}
	
	function MM_swapImage() { //v3.0
	  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
	   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
	}

</script>
<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body bgcolor="#dcdfec" leftmargin="0" topmargin="0" bottommargin="0" rightmargin="0" marginwidth="0" marginheight="0" onLoad="focuser()">
<table width="900" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="89" background="img/border_left.gif" rowspan="3"><img src="img/trans.gif" width="89"></td>
    <td align="center" valign="top" bgcolor="#FFFFFF">
		<div class="bighead">&nbsp;spyspace</div><br>
		<table lign="center" border=0>
		<form name="login" method="post" action="login.php">
			<tr>
				<td align="right">username:&nbsp;</td>
				<td><input name="ssusername" type="text" size="20" maxlength="20" value="<?=$u?>"></td>
			<tr>
				<td align="right">password:&nbsp;</td>
			  	<td><input name="password" type="password" size="20" maxlength="20"></td>
			</tr>	
			<tr>
				<td align="right">&nbsp;</td>
			  	<td height="26"><input name="subm" type="submit" value=" log in "></td>
			</tr>	
			<tr>
				<td>&nbsp;</td>
				<td height="90" valign="bottom"><br>
					<a href="register.htm">register here</a><br><br>
					<a href="faq.php">frequently asked questions</a><br><br>
					<a href="forgotpassword.php">forgot your password?</a><br><br>
					<a href="instructions.php">forgot your html code?</a><br><br>
					
<!-- ADDFREESTATS.COM AUTOCODE V4.0 -->
<script type="text/javascript">
<!--
var AFS_Account="00609179";
var AFS_Tracker="auto";
var AFS_Server="www6";
var AFS_Page="DetectName";
var AFS_Url="DetectUrl";
// -->
</script>
<div style="visibility:hidden"><script type="text/javascript" src="http://www6.addfreestats.com/cgi-bin/afstrack.cgi?usr=00609179"></script></div>
<noscript>
<a href="http://www.addfreestats.com" >
<img src="http://www6.addfreestats.com/cgi-bin/connect.cgi?usr=00609179Pauto" height=0 width=0 border=0 title="AddFreeStats.com Free Web Stats!"></a>
</noscript>
<!-- ENDADDFREESTATS.COM AUTOCODE V4.0  -->	

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2110104; 
var sc_invisible=1; 
var sc_partition=19; 
var sc_security="7b4cbecb"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c20.statcounter.com/counter.php?sc_project=2110104&java=0&security=7b4cbecb&invisible=1" alt="web tracker" border="0"></a> </noscript>
<!-- End of StatCounter Code -->
					
				</td>
			</tr>	
		</form>	
		</table>
		<br><br>

<script type="text/javascript"><!--
google_ad_client = "pub-3257425409427069";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text";
google_ad_channel = "";
google_color_border = "FFFFFF";
google_color_bg = "FFFFFF";
google_color_link = "666666";
google_color_text = "999999";
google_color_url = "CCCCCC";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>


<br><br><br>
	</td>
    <td width="89" background="img/border_right.gif" rowspan="3"><img src="img/trans.gif" width="89"></td>
  </tr>
  <tr>
	<td align="center" bgcolor="#FFFFFF">
			<a href="http://www.logjamming.com"><img src="img/aff_mrlog.gif" alt="hosted by logjamming.com" title="hosted by logjamming.com" name="mrlog" width="42" height="51" border="0" id="mrlog" onMouseOver="MM_swapImage('mrlog','','img/aff_mrlogover.gif',1)" onMouseOut="MM_swapImgRestore()" /></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.gasmacaroni.com/gas.pcgi"><img src="img/aff_skull.gif" alt="aquainted with gas macaroni" title="aquainted with gas macaroni" name="skull" width="40" height="49" border="0" id="skull" onMouseOver="MM_swapImage('skull','','img/aff_skullover.gif',1)" onMouseOut="MM_swapImgRestore()" /></a>&nbsp;
		  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.standoffish.com"><img src="img/aff_moose.gif" alt="associated with standoffish" title="associated with standoffish" name="moose" width="58" height="51" border="0" id="moose" onMouseOver="MM_swapImage('moose','','img/aff_mooseover.gif',1)" onMouseOut="MM_swapImgRestore()" /></a>
	</td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF">
		<div class="foot">spyspace is not endorsed by or affiliated with myspace. <a href="tos.php">terms of service</a></div>
	</td>
  </tr>
</table>


</body>
</html>