<?php
include 'db.php';
include 'encrypt.php';

$userinfo_enc = $_COOKIE['ui'];
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$ssusername_cookie = $userinfo_array[0];
$subscribed = $userinfo_array[3];

$theip = $_GET['ip'];
$theip = htmlspecialchars($theip);
$theip = mysql_real_escape_string($theip);
$ssusername = $_GET['ssusername'];
$ssusername = htmlspecialchars($ssusername);
$ssusername = mysql_real_escape_string($ssusername);
$date_time = $_GET['date_time'];
$date_time = htmlspecialchars($date_time);
$date_time = mysql_real_escape_string($date_time);
$o = $_GET['o'];
$o = htmlspecialchars($o);
$o = mysql_real_escape_string($o);

$ref = @$_SERVER['HTTP_REFERER'];
if ($ref == '') $ref = "index.php?u=$ssusername&o=$o";

//came_from not passed right now
//$came_from = $_GET['came_from'];
//if ($came_from == '') $came_from = $ref;

if ($ssusername == '') exit('username is blank, dude.');

//don't let people change the querystring
if ($ssusername_cookie != 'land'){
	if ($ssusername_cookie != $ssusername) exit('please <a href=login.php>log in</a> to use this feature.');
}


$sql = "SELECT * FROM track WHERE ssusername='$ssusername' AND ip = '$theip' AND date_time='$date_time' LIMIT 1";
$result = mysql_query($sql);

while ($userdata = mysql_fetch_object($result)) {
		$friendid = $userdata -> friendid;
		$ip = $userdata -> ip;
		$date_time_raw = $userdata -> date_time;
		$clipboard = $userdata -> clipboard;
		
}
	
$ok2update = false;
if ($clipboard == 'usr_edt') $ok2update = true;
//if friend id is anything other than "?", don't delete.  
if (($friendid=='?') || ($friendid=='') || ($friendid==-1)) $ok2update = true;

if ($ok2update == true) {

	$sql2 = "DELETE FROM track WHERE ssusername='$ssusername' AND ip='$theip' AND date_time='$date_time' LIMIT 1";
	$result = mysql_query($sql2);
	//echo 'deleted';
	header("Location: $ref");
} else {
	echo $friendid.')) sorry, i can\'t delete this one. email spyspace@gmail.com if you have any questions.  <a href=javascript:history.back()>back</a>';
}
?>