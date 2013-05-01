<?
//img src=http://spyspace.standoffish.com/img/404username --> redirect.php, records 

include 'db.php';

header("HTTP/1.0 200 OK");
//$browza = $HTTP_USER_AGENT;
$ref = @$_SERVER['HTTP_REFERER'];
$qstring = $_SERVER['QUERY_STRING'];
$path = $_SERVER['REQUEST_URI'];
if (!strstr($path,"/img/")) {
	echo "404 file not found <br><br>$HTTP_USER_AGENT";
	exit;
}
$ssuser = str_replace("/img/","",$path);
$ssuser = str_replace(".png","",$ssuser);

$browser = $_SERVER['HTTP_USER_AGENT'];
$ssusername = $ssuser;
$friendid = '?';
$ip = $_SERVER['REMOTE_ADDR'];
$date_time = date("Y-m-d H:i:s");

$referrer = $ref;
$clipboard = '';
$username = '';
$img = '';

if ($ssusername == 'land') {
	if (strpos($referrer,'&friendid=38545729') == true) {
		exit('.');
	}
}

$sql = "INSERT INTO track (ssusername,friendid,ip,date_time,browser,referrer,clipboard,username,img) 
	VALUES ('$ssusername','$friendid','$ip','$date_time','$browser','$referrer','$c','$username','$img')";
$result = mysql_query($sql);

header ("Content-type: image/gif"); 
header ("Location: trans.gif");
exit;
?>