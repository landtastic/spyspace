<?
include 'db.php';
include 'encrypt.php';

error_reporting(E_ALL ^ E_NOTICE);

$userinfo_enc = $_COOKIE['ui'];
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$ssusername = $userinfo_array[0];
$password = $userinfo_array[1];
$block = $userinfo_array[2];
$subscribed = $userinfo_array[3];
if (!$ssusername) exit('please <a href=login.php>log in</a> to donate.');

$browza = $_SERVER['HTTP_USER_AGENT'];
if (strstr($browza,'MSIE')) $ie_br='<br>';
?>
<html>
<head>
<title>spyspace - myspace tracker - donate</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
td { font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; color:#666666; }
input { border:1px solid #cccccc; font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; }
A:link,A:visited,A:active { color:#222222; }
A:hover { color:#555555; }
.explain { font-size: 11px; color:#ffffff; }
.explain2 { font-size: 11px; color:#999999; }
.instruct { font-size: 12px; text-align:center; width:483px; }
.disclaim { font-size: 11px; color:#999999; text-align:left; width:483px; }
.head { font-size:12px; letter-spacing: 5px; }
.bighead { font-size:13px; letter-spacing: 64px; padding-top:50px; padding-bottom:30px; }
.termsbox { width:483px; height:120px; overflow:auto; border:1px solid #cccccc; text-align:left; padding:5px; }
.micro { font-size: 0px; color:#ffffff; visibility:hidden; height:1px;}
sup { font-size: 7px; }
</style>

<script language="javascript">
function checkAmount() {
	if(isNaN(document.forms[0].amount.value) == true) {
		alert("hey, that's not a number.");
		return false;
	}else if(document.forms[0].amount.value < 2) {
		alert("i said the minimum donation was $2, cheapskate.  read that text down there.");
		return false;
	}
}
</script>

</head>
<body bgcolor="#dcdfec" leftmargin="0" topmargin="0" bottommargin="0" rightmargin="0" marginwidth="0" marginheight="0">

<table width="900" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="89" background="img/border_left.gif"><img src="img/trans.gif" width="89"></td>
    <td align="center" valign="top" bgcolor="#FFFFFF">
		<div class="bighead">&nbsp;spyspace</div><br>
		<br /><br />
		<div class="instruct">
has spyspace been useful to you?  want to show your support?  
<br><br><?=$ie_br?>
<?
$cnt_query = "SELECT COUNT(*) FROM track WHERE ssusername='$ssusername'"; 
$cnt_result = mysql_query($cnt_query) or die("...");
$cnt = mysql_fetch_array($cnt_result);
$totalviews = $cnt[0];

if ($subscribed < 1) {
	if ($totalviews > 300) echo("wow, <b>$totalviews</b> views, huh?  how's that working out for you? <br><br>$ie_br");
	echo("donors will receive spyspace enhanced<sup>TM</sup> *");
} else {
	echo ("it looks like you already have.  has anyone ever told you how beautiful<br> you are?  well you are. <br><br>$ie_br
	you have spyspace enhanced<sup>TM</sup>.
	");
}
?>
		</div>
<br> <br><br><?=$ie_br?>

<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" onSubmit="return checkAmount();">
<table>
	<tr>
		<td>username:</td>
		<td><?=$ssusername?><input type="hidden" name="on0" value="spyspace_username"><input type="hidden" name="os0" maxlength="200" value="<?=$ssusername?>"></td>
	</tr>
	<tr>
		<td>donation:</td>
		<td>$<input type="text" name="amount" value="5.00" size="5"></td>
	</tr>
	<tr>
		<td colspan="2" height="60"><input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="border:0px"></td>
	</tr>
</table>

<input type="hidden" name="add" value="1">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="spyspace@gmail.com">
<input type="hidden" name="item_name" value="spyspace enhanced">

<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="return" value="http://spyspace.cc/done_sandbox.php">
<input type="hidden" name="cbt" value="CLICK HERE TO UPGRADE YOUR SPYSPACE ACCOUNT!">
<input type="hidden" name="cn" value="comments?">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="bn" value="PP-ShopCartBF">
</form>

<br><br>
<div class="disclaim">*spyspace enhanced features:  <li>match previous visitors to identify unidentified hits (useful if you're tracking someone in particular that has been tracked before)
<li>greater access to spyspace database
<li>easy access to geolocation tools
<li>ads at the top go away
<li>you won't be locked out once registration is closed
<li>email support without hurtful swear words, questions actually answered
<li>keep me off the streets and out of gangs
<br><br>
"match previous visitors" feature works best if you already have over 100 views.  this will become more and more useful as the database expands, and will be the only way to identify hits once the code is blocked.  additional code installation is required, instructions available once you donate/upgrade.   <br><br><?=$ie_br?>
recommended donation: $5.  minimum donation: $2.  donations are non-refundable.  you should donate because you appreciate this thing, not because you expect anything in return.  spyspace could be blocked at any moment, make sure you understand this before donating.
<br><br><?=$ie_br?>
use a paypal account for instant activation.  if you pay with a credit card instead of a paypal account, make sure you click the link at the end of the process that says "CLICK HERE TO UPGRADE YOUR SPYSPACE ACCOUNT."  if your account still doesn't seem to auto-upgrade after you log out and log in, you can always email me (the email address is on another page, i want to encourage people to read around the site before emailing me). 

<br><br><br></div>

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2117983; 
var sc_invisible=1; 
var sc_partition=19; 
var sc_security="c2a15d21"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c20.statcounter.com/counter.php?sc_project=2117983&java=0&security=c2a15d21&invisible=1" alt="free web stats" border="0"></a> </noscript>
<!-- End of StatCounter Code -->
		</td>
    <td width="89" background="img/border_right.gif"><img src="img/trans.gif" width="89"></td>
  </tr>
</table>

</body>
</html>
