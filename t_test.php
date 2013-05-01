<?php
//include 'db.php';
	$db = mysql_connect('localhost', 'root','tr0ufro0');
	mysql_select_db("spyspace",$db);

include 'encrypt.php';

header("Expires: Thu, 01 Jan 1970 00:00:00 GMT, -1 ");
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");

$ssusername = $_GET['ssu'];
$friendid = str_replace("'","",$_GET['u']);
$ip = $_SERVER['REMOTE_ADDR'];
$date_time = date("Y-m-d H:i:s");
$browser = $_SERVER['HTTP_USER_AGENT'];
$referrer = $_GET['r'];
$clipboard = ''; //$_GET['c'];
$ssuser_page = @$_SERVER['HTTP_REFERER'];
$username = $_GET['un'];
$img = $_GET['img'];

//make sure tracker is embedded in an actual ssuser profile page
if (strpos($ssuser_page,'myspace.com') == false) {
	exit('.');
}

//block logged in, subscribed users from being tracked
$bblock = false;
/*
$userinfo_enc = $_COOKIE['ui'];
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$subscribed = $userinfo_array[3];
if ($subscribed > 0) $bblock = true;
if ($subscribed == 1) $bblock = true;
if ($subscribed == '1') $bblock = true;
if ($ssusername == 'land') $bblock = false;
*/
//print_r($_COOKIE);
//echo "..$subscribed..";
//echo "||$bblock||";

if ($clipboard == "block_me") $bblock = true;
//if (($REMOTE_ADDR == '24.126.182.175') && ($c != "track_me")) $bblock = true;

if ($bblock == false) {
	

	$sql = "INSERT INTO track (ssusername,friendid,ip,date_time,browser,referrer,clipboard,username,img) 
		VALUES ('$ssusername','$friendid','$ip','$date_time','$browser','$referrer','$clipboard','$username','$img')";
	$result = mysql_query($sql);
	//echo $sql;
	//echo '||'.$result.'||';
	//echo "::$bblock::";
}
?>