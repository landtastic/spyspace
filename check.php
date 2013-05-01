<?
include 'db.php';
include 'encrypt.php';

error_reporting(E_ALL ^ E_NOTICE);

$userinfo_enc = $_COOKIE['ui'];
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$ssusername_cookie = $userinfo_array[0];
$subscribed = $userinfo_array[3];

$ssusername = $_GET['ssusername'];
$ssusername = htmlspecialchars($ssusername);
$ssusername = mysql_real_escape_string($ssusername);
$theip = $_GET['ip'];
$theip = htmlspecialchars($theip);
$theip = mysql_real_escape_string($theip);
$date_time_2u = $_GET['date_time'];
$date_time_2u = htmlspecialchars($date_time_2u);
$date_time_2u = mysql_real_escape_string($date_time_2u);
$o = $_GET['o'];
$o = htmlspecialchars($o);
$o = mysql_real_escape_string($o);
$rowid = $_GET['rowid'];
$rowid = htmlspecialchars($rowid);
$rowid = mysql_real_escape_string($rowid);

if ($ssusername == '') exit('username is blank, dude.');

//don't let people change the querystring
if ($ssusername_cookie != 'land') {
	if ($ssusername_cookie != $ssusername) exit('please <a href=login.php>log in</a> to use this feature.');
}
?>

<html>
<head>
<title>spyspace enhanced - previous view checker/ip locator</title>
<style>
* { font-family:verdana; font-size:11px; }
br { font-size:10px; }
h1 { font-size:13px; }
body { background-color: #dcdfec; margin:0; background-image: url(img/stripey_bg.gif); }
.hdr td { background-color: #dcdfec; font-weight:bold; }
.odd td { background-color: #dcdfec; }
/*table { border-collapse:collapse; border: 0px solid black; background-color: #dcdfec; }*/
/*table tr:hover td { background-color: #dcdfec; }*/
td, th { padding: 1px 3px 0px 3px; }
body a, body a:link { color: #325C91; }
body a:visited, body a:hover { color:4b8ada; }
a.adv:link, a.adv:visited, a.adv:hover, a.adv:active { color:#000000; font-weight:bold; }
.bighead { font-size:9px; letter-spacing: 40px; padding-top:14px; padding-bottom:20px;  }
a.bh:link, a.bh:visited, a.bh:hover, a.bh:active { color:#000000; text-decoration:none; CURSOR: help; }
.micro { font-size: 0px; color:#edeffe; visibility:hidden;}
.nohits { padding: 30px; }
.news { font-family: tahoma, verdana, arial; font-size: 11px; letter-spacing: 1px; border: 1px dashed #666; padding:4px; margin:20px; display:none; }
hr.dotted { background:none; border:none; border-bottom: 1px dotted #cccccc; }
form { margin: 0px; padding: 0px; }
.subm { width:210px; padding-bottom:2px; }
sup { font-size: 7px; }
</style>
<script language="JavaScript" type="text/javascript" src="JSFX_ImageZoom.js"></script>
<script language="javascript">
function info_pfi() {
	alert('this viewer was logged out, but previous login(s) were detected.  this is a list of people who have previously logged into myspace on the viewer\'s browser.  basically, this view was most likely one of these people.  it\'s kind of inaccurate, but hey, it\'s better than nothing.')
}
function info_ip_locator() {
	alert('look up the city and country of this visitor by using any of these services.  they each seem to provide varying results, but i\'ve found maxmind to be the most accurate.')
}
function note_focus() {
	if (document.update.note_txt) document.update.note_txt.focus();
}
</script>
</head>

<?
//donors only
if (($subscribed < 1) || (!$subscribed)) { 
	echo("<a href=\"javascript:parent.close_checkip($rowid)\"><b>close</b></a>");
	echo('<br><br>sorry, spyspace enhanced<sup>TM</sup> is only available to donors.  <br><br>you can donate <a href="donate.php" target="_top">here</a>.  <br><br>if you did donate and you\'re still seeing this page, try logging out <br>and logging in again.  if that doesn\'t work, email me. ');//header("Location: sorry.php"); 
	exit();
}
?>

<body onLoad="note_focus();" onFocus="note_focus();">
<a href="javascript:parent.close_checkip(<?=$rowid?>)"><b>close</b></a>
<?php 
$more = $_GET['more'];
$update = $_GET['update'];

$ref = "index.php?u=$ssusername&o=$o";

////////update unknown view///////////
if ($update == 1) {
	
	$userdata_str = $_GET['userdata_str'];
	$userdata_str = htmlspecialchars($userdata_str);
	$userdata_str = mysql_real_escape_string($userdata_str);
	
	$userdata_array = explode('**',$userdata_str);

	$new_friendid = $userdata_array[0];
	$new_username = $userdata_array[1];
	$new_img = $userdata_array[2];
	
	//pre-query
	$sql = "SELECT friendid,ip,date_time,clipboard,username,img FROM track WHERE ssusername='$ssusername' AND ip = '$theip' AND date_time='$date_time_2u' LIMIT 1";
	$result = mysql_query($sql);
	
	while ($userdata = mysql_fetch_object($result)) {
			$friendid = $userdata -> friendid;
			$ip = $userdata -> ip;
			$date_time_raw = $userdata -> date_time;
			$clipboard = $userdata -> clipboard;
			$username = $userdata -> username;
			$img = $userdata -> img;
	}
	$ok2update = false;
	if ($clipboard == 'usr_edt') $ok2update = true;
	//if friend id is anything other than "?" '' or -1 don't update.  
	if (($friendid=='?') || ($friendid=='') || ($friendid==-1) || ($friendid=='undefined')) $ok2update = true;
	
	if ($ok2update == true) {
	
		$make_a_note = $_GET['make_a_note'];
		$make_a_note = htmlspecialchars($make_a_note);
		$make_a_note = mysql_real_escape_string($make_a_note);
		$note_txt = $_GET['note_txt'];
		$note_txt = htmlspecialchars($note_txt);
		$note_txt = mysql_real_escape_string($note_txt);
		if ($make_a_note == 1) {
			//make a note
			$sql2 = "UPDATE track SET username = '$note_txt', clipboard = 'usr_edt' WHERE ssusername='$ssusername' AND ip='$theip' AND date_time='$date_time_2u' LIMIT 1";
		} else {
			//update unknown view with friendid, pic, name, tag usr_edt in clipboard field to flag that it's edited
			$sql2 = "UPDATE track SET friendid = '$new_friendid', username = '$new_username', img = '$new_img', clipboard = 'usr_edt' WHERE ssusername='$ssusername' AND ip='$theip' AND date_time='$date_time_2u' LIMIT 1";
		}
		$result = mysql_query($sql2);
		//echo 'updated';
		//header("Location: $ref");id,new_friendid,new_username,new_img,note_opt
		echo "<script language=javascript>parent.close_checkip_update($rowid,'$new_friendid','$new_username','$new_img','$note_txt')</script>";
	} else {
		echo "<br><br>sorry, you can only update unknown views.  (logged out views count as known views.)";
	}
		
	exit();
}
//////////////end update view section////////////////////

if ($more == '') { 
	//little query, more accurate
	$sql = "SELECT friendid, ip ,date_time,	DATE_FORMAT(date_time,'%m/%d/%Y %h:%i:%s %p') as date_time_formatted, browser, referrer, clipboard, username, img FROM track WHERE ip = '$theip' AND ssusername='$ssusername' AND friendid REGEXP ('[0-9]')
AND clipboard != 'usr_edt' AND username != '' GROUP BY friendid ORDER BY date_time DESC LIMIT 30;";
	
	echo(' | <b>previous visitors to your profile with ip address '.$theip.'</b>  (there\'s a good chance it\'s one of these)<br><br>');
	
} else {
	//big query, less accurate
	//changed 9/27/07  
	//$sql = "SELECT friendid, ip, date_time, DATE_FORMAT(date_time,'%m/%d/%Y %h:%i:%s %p') as date_time_formatted, browser, referrer, clipboard, username, img FROM track WHERE ip = '$theip' GROUP BY friendid ORDER BY date_time DESC LIMIT 30;"; // AND clipboard != 'usr_edt' (removed)  
	$sql = "SELECT friendid, ip, date_time, DATE_FORMAT(date_time,'%m/%d/%Y %h:%i:%s %p') as date_time_formatted, browser, referrer, clipboard, username, img FROM track WHERE ip = '$theip' AND friendid != '' GROUP BY img ORDER BY date_time ASC LIMIT 30"; //AND username != '' (removed)
	
	echo('| <b>full database search for ip '.$theip.'</b> (this can be inaccurate, as different people can use the same computer/network, and ip addresses can change)<br><br>');
}

?>
<table>
<form name="update" method="get" action="check.php">
<?
$result = mysql_query($sql);
if ($result){
	$cnt = mysql_num_rows($result);

	$c = 0;
	$i = 1;
	while ($userdata = mysql_fetch_object($result)) {

		$friendid = $userdata -> friendid;
		$ip = $userdata -> ip;
		$date_time = $userdata -> date_time_formatted;
		$date_time_raw = $userdata -> date_time;
		$browser = $userdata -> browser;
		$referrer = $userdata -> referrer;
		$clipboard = $userdata -> clipboard;
		$username = $userdata -> username;
		$img = $userdata -> img;

		$referrer_txt = str_replace('http://','',$referrer);
		if (strlen($referrer_txt) > 42) $dotdotdot = '...'; else $dotdotdot = '';
		$referrer_txt = substr($referrer_txt,0,42);
		$referrer_txt .= $dotdotdot;
		if ($referrer == '') { 
			$referrer = '#(no referrer)';
			$referrer_txt = 'unknown';			
		}


		//if (($username != 'undefined') && ($username != '') && ($clipboard != 'usr_edt')) {
		//if (($friendid != '') && ($friendid != '?') && ($friendid != '???') && ($clipboard != 'usr_edt')) {  
		if ((is_numeric($friendid) && ($clipboard != 'usr_edt')) || ($friendid == '???')) {
		
				if ($img == '') $img = 'http://x.myspace.com/images/no_pic.gif';
				$img_str = "<a href=\"http://www.myspace.com/index.cfm?fuseaction=user.viewProfile&friendID=$friendid\" id=\"c$c\" target=_blank><img src=\"$img\" border=0 onmouseover=\"JSFX.zoomIn(this,8,50);\" onmouseout=\"JSFX.zoomOut(this,8,50);\" width=44 height=34></a>";
				//if ($img == '') $img_str = '';
				$username_str = "<a href=\"http://www.myspace.com/index.cfm?fuseaction=user.viewProfile&friendID=$friendid\" target=_blank>$username</a>";
			
				if (($friendid=='???') && ($img!='http://x.myspace.com/images/no_pic.gif')) {
					//possible friendids. moved to img column because it has 150 chars. indicated by ??? sent to userid
					$img_str = '<img src="img/q_pfi.gif" width=45 height=32 border=0>';
					$pfi_string = $img;
					$pfi_array = explode(",", $pfi_string);
					if ($pfi_array[0]) {
						//convert possible friend ids into html
						$pfi_link_str = "";
						foreach ($pfi_array as $pfi) {
							$pfi_link_str = "$pfi_link_str <a href=\"http://www.myspace.com/index.cfm?fuseaction=user.viewProfile&friendID=$pfi\">$pfi</a>| ";
						}
						$username_str = $pfi_link_str;
						$username_str = $username_str . '<a href=# onClick="info_pfi(); return false;" class=bh style="font-weight:normal">[?]</a>';
					}
				}
				
				if ($c == 0) $checkfirst = ' checked=checked '; else $checkfirst = '';
				
				//make browser string a little shorter
				$browser = str_replace('Mozilla/4.0 ','',$browser);
				$browser = str_replace('Mozilla/5.0 ','',$browser); 
		
				echo("<tr>
				<td><input type=radio value=\"$friendid**$username**$img\" name=userdata_str $checkfirst onclick=document.update.submit();></td>
				<td>$img_str</td>
				<td>$username_str</td>
				<td>$ip</td>
				<td>$date_time</td>");
				echo "<td>$browser</td>";
				echo("<td><a href=\"$referrer\">$referrer_txt</a></td><td>");
				//if ($subscribed >= 1) echo "$clipboard";
				echo("</td></tr>\n");
				$i++;
				if ($i == 2) {
					$rowcolor='class="odd"'; 
					$i = 0;
				}else{ 
					$rowcolor='';
				}
			$c++;
			
		} 
		
	} //while

} //result
else {
	die( "ERROR: " . mysql_error() );
}
?>
</table>
<?
$ip_locator_html = '
<table style="border: 1px solid black"><tr><td>
<b>ip address locator</b> <a href=# onClick="info_ip_locator(); return false;" class=bh style="font-weight:normal">[?]</a><br>
<form method="post" action="http://www.maxmind.com/app/locate_ip" target="_blank">
<input name="ips" type="text" value="'.$theip.'">
<input type="submit" value="look up location at maxmind" class=subm>
</form>

<form method="post" action="http://www.ip2location.com/free.asp" target="_blank">
<input name="ipaddresses" type="text" value="'.$theip.'">
<input type="submit" value="look up location at ip2location" class=subm></form>

<form method="post" action="http://www.geobytes.com/IpLocator.htmIpLocator.htm?GetLocation" target="_blank">
<input type="text" name="ipaddress" value="'.$theip.'">
<input type="submit" value="look up location at geobytes" class=subm>
</form>
</td></tr></table>
';

if ($more == '') {
	if ($c == 0) { ?>
		<br><b>no matches found.  </b><br><br>searching entire database...<br><br>
		<script>var t=setTimeout("document.search_entire.submit();",500);</script>
<?	}
} else {
	if ($c == 0) { ?> 
	<table cellpadding="0" cellspacing="0" border=0 width="90%">
		<tr><td valign="top">
			<br><b>nope, no further matches found.  </b> <br>
			<br><br>
			write a short note about this unknown view:<br>
			<input type="hidden" name="make_a_note" value="1">
			<input type="text" name="note_txt" value="<?=$username?>" length="20" maxlength="20">
			<input type="submit" value="make a note"><br>
			
			<input type="hidden" name="ssusername" value="<?=$ssusername?>">
			<input type="hidden" name="ip" value="<?=$theip?>">
			<input type="hidden" name="update" value="1">
			<input type="hidden" name="o" value="<?=$o?>">
			<input type="hidden" name="rowid" value="<?=$rowid?>">
			<input type="hidden" name="date_time" value="<?=$date_time_2u?>">
			</form>
		</td>
		<td align="left">
			<?=$ip_locator_html?>
		</td></tr>
	</table>
	<?
	}
}

if ($c > 20) echo "<br><b>too many matches found!  this is probably a dynamic aol ip or something.  these results cannot be trusted.</b><br>";
if ($c > 2) {
	$if_height = $c * 55;
	if ($c > 25) $if_height = 1200;
	?>
	<script language="javascript">parent.document.getElementById('if_<?=$rowid?>').height=<?=$if_height?>;</script>
<? } ?>
<table cellpadding="0" cellspacing="0"><tr>
<?
if ($c > 0) { ?>
	<td><br><input type="submit" value="update unknown view"></td>
<? } ?>

<input type="hidden" name="ssusername" value="<?=$ssusername?>">
<input type="hidden" name="ip" value="<?=$theip?>">
<input type="hidden" name="update" value="1">
<input type="hidden" name="o" value="<?=$o?>">
<input type="hidden" name="rowid" value="<?=$rowid?>">
<input type="hidden" name="date_time" value="<?=$date_time_2u?>">
</form>
<?
if ($more == '') {
?>
<form method="get" action="check.php" name="search_entire">
<td valign="bottom">
	<? if ($c > 0) { ?>
	<input type="submit" value="search entire database for ip" name="butt">
	<? } else { ?>
	<noscript><input type="submit" value="search entire database for ip" name="butt"></noscript>
	<? } ?>
<input type="hidden" name="ssusername" value="<?=$ssusername?>">
<input type="hidden" name="ip" value="<?=$theip?>">
<input type="hidden" name="more" value="1">
<input type="hidden" name="o" value="<?=$o?>">
<input type="hidden" name="rowid" value="<?=$rowid?>">
<input type="hidden" name="date_time" value="<?=$date_time_2u?>">
</form>
</td>
<? } ?>
</tr></table>
<br>
<?
if ($c > 0) {
	echo $ip_locator_html;
}
?>
</body>
</html>
