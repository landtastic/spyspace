<?
include 'db.php';
include 'encrypt.php';

error_reporting(E_ALL ^ E_NOTICE);

$userinfo_enc = $_COOKIE['ui'];
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$ssusername_cookie = $userinfo_array[0];
if (($ssusername_cookie != 'land')) exit('...'); 

$sql_cnt = "SELECT COUNT(*) from users";
$result_cnt = mysql_query($sql_cnt);
$cnt_row = mysql_fetch_row($result_cnt);
$cnt = $cnt_row[0];

$sql = "SELECT ssusername, email, ip, block, date_registered, subscribed FROM users ORDER BY date_registered DESC LIMIT 1000"; 
if ($_GET['top']) $sql = "SELECT track.ssusername, users.email, users.ip, users.date_registered, users.subscribed, COUNT(*) AS block FROM track,users where (track.ssusername = users.ssusername) GROUP BY ssusername ORDER BY block DESC LIMIT 1000 ";
if ($_GET['subbed']) $sql = "SELECT ssusername, email, ip, block, date_registered, subscribed FROM users WHERE subscribed > 0 ORDER BY date_registered DESC";
$result = mysql_query($sql);
$cur_cnt = mysql_num_rows($result);

echo "<a href=users27.php>$cnt users</a> | <a href=users27.php?top=1>order by most views</a> | <a href=users27.php?subbed=1>show subbed users</a> $cur_cnt";
if ($_GET['subbed']) echo (" ~ $". (($cur_cnt) * 4.70));
?>
<html>
<head>
<title>spyspace - users</title>
<style>
* { font-family:verdana; font-size:11px; }
body { margin-top:0px; margin-right:0px; margin-bottom:0px; margin-left:0px; background-color: #edeffe; }
.hdr td { background-color: #e9ebfa; font-weight:bold; }
.odd td { background-color: #e9ebfa; }
table { border-collapse:collapse; border: 0px solid black; background-color: #edeffe; width: 100%; }
table tr:hover td { background-color: #dcdfec; }
td, th { padding: 1px 3px 0px 3px; }
a, a:link { color: #325C91; }
a:visited, a:hover { color:4b8ada; }
img a:hover { background-position: -100px 0; }
/*img { width:50%; height:50%px; }*/
</style>
</head>
<body>
<table border=0>
	<tr class="hdr">
		<td>ssusername</td>
		<td>email</td>
		<td>ip</td>
		<td>block</td>
		<td>date_registered</td>
		<td>subscribed</td>
	</tr>
<?php
if ($result){
	$c = 0;
	$i = 1;
	while ($userdata = mysql_fetch_object($result)) {
		$ssusername = $userdata -> ssusername;
		$email = $userdata -> email;
		$ip = $userdata -> ip;
		$block = $userdata -> block;
		$msuserid = $userdata -> msuserid;
		$date_registered = $userdata -> date_registered;
		$subscribed = $userdata -> subscribed;
	
		echo("<tr $rowcolor>
		<td><a href=\"index.php?u=$ssusername\">$ssusername</td>
		<td>$email</td>
		<td>$ip</td>
		<td>$block</td>
		<td>$date_registered</td>
		<td>$subscribed</td>
		</tr>");
		$i++;
		if ($i == 2) {
			$rowcolor='class="odd"'; 
			$i = 0;
		}else{ 
			$rowcolor='';
		}
		$c++;
	}
}
else {
	die( "ERROR: " . mysql_error() );
}
?>
</table>
	
</body>
</html>