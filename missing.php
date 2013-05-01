<?
include 'db.php';

$browza = $HTTP_USER_AGENT;
$ref = $HTTP_REFERER;
$qstring = $_SERVER['QUERY_STRING'];
header("HTTP/1.0 200 OK");
$ssuser = $_SERVER['REQUEST_URI'];
$ssuser = str_replace("/s/","",$ssuser);
$ssuser = str_replace(".swf","",$ssuser);

if (($ssuser == 'bebekitten') || ($ssuser == 'pinkbebekitten')) exit('user gets too many damn views');
if ($ssuser == 'julie') exit('.');

if (strpos($ref,'ConfirmComment') > -1) {
	//set users db "block" column to 2 - meaning "do not display results for this user"
	$query="UPDATE users SET block=2 WHERE ssusername='$ssuser'";
	mysql_query($query);
	mysql_close();
	//delete cookie	
	setcookie("ui", "", time() - 3600);
	header("Location: http://l4nd.com/s/comment_warning.swf");
	//header("Location: http://l4nd.com/img3.png");
} else {
	if (strstr($browza,'MSIE')) {
		if ($ssuser) {
			//header('Content-type: application/x-shockwave-flash');
			header("Location: http://l4nd.com/s/s.cab?u=".$ssuser);
			exit;
		}
	} else { //firefox / safari
		//header('Location: http://spyspace.standoffish.com/t.php?ssu='.$ssuser.'&u=non-ie&r=');
		
		//pablo method
		//header("Location: http://l4nd.com/s/s2.cab?u=".$ssuser);
		
		echo "404 file not found <br><br>$HTTP_USER_AGENT";
		exit;
	}
}
?>