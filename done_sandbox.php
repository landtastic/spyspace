<?
include 'db.php';
include 'encrypt.php';

error_reporting(E_ALL ^ E_NOTICE);

// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-synch';

$tx_token = $_GET['tx'];
if (!$tx_token) exit();
$auth_token = "wVm2wS-l93W8oqnGQrzHzf7KWUwv6kC9p7_COAtktnXdNY1xr67VxRcIEcm"; //sandbox
//$auth_token = "-K6uTlQtHRDVWquDycz2OeREwK7_Ok4gBL4_ILSXqtD8iGCjIw36cj-CNwG";
$req .= "&tx=$tx_token&at=$auth_token";

// post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
//$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);
$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);
// If possible, securely post back to paypal using HTTPS
// Your PHP server will need to be SSL enabled
// $fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
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
.disclaim { font-size: 11px; color:#999999; text-align:center; width:483px; }
.head { font-size:12px; letter-spacing: 5px; }
.bighead { font-size:13px; letter-spacing: 64px; padding-top:50px; padding-bottom:30px; }
.termsbox { width:483px; height:120px; overflow:auto; border:1px solid #cccccc; text-align:left; padding:5px; }
.micro { font-size: 0px; color:#ffffff; visibility:hidden; height:1px;}
</style>

</head>
<body bgcolor="#dcdfec" leftmargin="0" topmargin="0" bottommargin="0" rightmargin="0" marginwidth="0" marginheight="0">

<table width="900" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="89" background="img/border_left.gif"><img src="img/trans.gif" width="89"></td>
    <td align="center" valign="top" bgcolor="#FFFFFF">
		<div class="bighead">&nbsp;spyspace</div><br>
		<table width="510" align="center" border=0><tr><td>
<?php
if (!$fp) {
	// HTTP ERROR
	echo ("HTTP_ERROR.  email spyspace@gmail.com with your username and registered email if you see this.");
} else {
	fputs ($fp, $header . $req);
	// read the body data
	$res = '';
	$headerdone = false;
	while (!feof($fp)) {
		$line = fgets ($fp, 1024);
		if (strcmp($line, "\r\n") == 0) {
			// read the header
			$headerdone = true;
		} else if ($headerdone) {
			// header has been read. now read the contents
			$res .= $line;
		}
	}

	// parse the data
	$lines = explode("\n", $res);
	$keyarray = array();
	if (strcmp ($lines[0], "SUCCESS") == 0) {
		for ($i=1; $i<count($lines);$i++){
			list($key,$val) = explode("=", $lines[$i]);
			$keyarray[urldecode($key)] = urldecode($val);
		//	echo ("$key <br>");
		}
		// check the payment_status is Completed
		// check that txn_id has not been previously processed
		// check that receiver_email is your Primary PayPal email
		// check that payment_amount/payment_currency are correct
		// process payment
		$firstname = $keyarray['first_name'];
		$lastname = $keyarray['last_name'];
		$itemname = $keyarray['item_name1'];
		$amount = $keyarray['payment_gross'];
		
		$receiver_email = $keyarray['receiver_email'];
		$receiver_email = trim($receiver_email);
		
		$ssusername_field_name = $keyarray['option_name1_1'];
		$ssusername = $keyarray['option_selection1_1'];
		
		if ($amount < 2) exit("error: hey, i said minimum $2 donation, cheapskate.  - spyspace@gmail.com");

		if (($receiver_email != 'l4nd@yahoo.com') && ($receiver_email != 'spyspace@gmail.com')) exit("error: receiver email doesn't match.  - spyspace@gmail.com<br><br> ::$receiver_email::");

		//subscribe user
		echo ("<p><h3>Thank you for your donation!</h3></p>");		
		echo ("<b>Payment Details</b><br>\n");
		echo ("<li>Name: $firstname $lastname</li>\n");
		echo ("<li>Username: $ssusername</li>\n");
		echo ("<li>Item: $itemname</li>\n");
		echo ("<li>Amount: $amount</li><br><br><br>\n");
		echo ("Your transaction has been completed, and a receipt for your donation has been emailed to you.<br><br><br>
		You may log into your account at <a href='https://www.paypal.com'>www.paypal.com</a> to view details of this transaction.<br><br><br><br>");
		if ($ssusername) {
			$query="UPDATE users SET subscribed=1 WHERE ssusername='$ssusername'";
			$result = mysql_query($query);
			if (!$result) die('query failed, email spyspace@gmail.com with "query failed" in the subject: ' . mysql_error());
			mysql_close();
			
			echo("<a href=login.php?u=$ssusername>Log in to spyspace</a> to enjoy your new and mysterious features!* <br><br><br>*features subject to change");
		} else {
			echo("Email spyspace@gmail.com with the subject \"UPGRADE ME\" and your username and the email you signed up with.  This process is supposed to be automated, but for some reason your username wasn't available to the program.  Don't worry though, if you donated, we will make sure you're taken care of.");
			
		}

	} else if (strcmp ($lines[0], "FAIL") == 0) {
		// log for manual investigation
		echo "Transaction possibly failed.  Or this might be a previous transaction that worked, but timed out.  Don't fret though, just email spyspace@gmail.com with your email and username, and the subject \"transaction failed\" and we'll figure this out, together.";
	}

}

fclose ($fp);
?>


		</td></tr></table>
	</td>
    <td width="89" background="img/border_right.gif"><img src="img/trans.gif" width="89"></td>
  </tr>
</table>

</body>
</html>