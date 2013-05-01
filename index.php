<?php
include 'db.php';
include 'encrypt.php';

error_reporting(E_ALL ^ E_NOTICE);

header("Expires: Thu, 01 Jan 1970 00:00:00 GMT, -1 ");
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");

$userinfo_enc = $_COOKIE['ui'];
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$ssusername = $userinfo_array[0];
$ssusername = htmlspecialchars($ssusername);
$ssusername = mysql_real_escape_string($ssusername);
$password = $userinfo_array[1];
$block = $userinfo_array[2];
$subscribed = $userinfo_array[3];
$u = $_GET['u'];


//if ($block == 3) exit("account banned for multiple ip registration. spyspace accounts are non-transferable. if you bought this account off of ebay, take it up with the seller.  <br><br> -  spyspace@gmail.com");
//if ($block == 2) exit("account blocked. adding spyspace to the comments of others is disallowed. <br><br> -  spyspace@gmail.com");


if ($ssusername == 'land') {
	$ssusername = $u;
} else {
	if (!isset($ssusername) || !isset($password) || ($u == '' || ($u != $ssusername))) { 
		header("Location: login.php?u=$u"); 
		exit(); 
	}
}

if (($subscribed < 1) || (!$subscribed)) header("Location: sorry.php"); 

$cnt_query = "SELECT COUNT(ssusername) FROM track WHERE ssusername='$ssusername'"; 
$cnt_result = mysql_query($cnt_query) or die("...");
$cnt = mysql_fetch_array($cnt_result);
$totalviews = $cnt[0];


//previous and next link stuff
$o = $_GET['o'];
if (!is_numeric($o)) $o = 0;
$unk = $_GET['unk'];
//turn unknown views on by default
if ($unk == '') $unk = 1;
if ($unk == 1) $unk_str = "&unk=1"; else $unk_str = '&unk=0';
$prev_o = $o - 30;
$next_o = $o + 30;
if ($prev_o < 0) $prev_link_str = ''; else $prev_link_str = "<a href=\"?u=$u$unk_str&o=$prev_o\"><< previous page</a>";
if ($next_o > $totalviews) $next_link_str = ''; else $next_link_str = "<a href=\"?u=$u$unk_str&o=$next_o\">next page >></a>";

if ($subscribed > 0) $prostring = 'enhanced'; else $prostring = '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>spyspace <?= $prostring . ' - myspace tracker - ' .$ssusername . ' - ' . $totalviews?> views tracked </title>
<link rel="icon" type="image/x-icon" href="favicon.ico">
<style>
* { font-family:verdana; font-size:11px; }
body { margin-top:2px; margin-right:2px; margin-bottom:2px; margin-left:2px; background-color: #dcdfec; }
.hdr td { background-color: #dcdfec; font-weight:bold; }
.odd td { background-color: #e9ebfa; }
table { border-collapse:collapse; border: 0px solid black; background-color: #edeffe; }
table tr:hover td { background-color: #dcdfec; }
td, th { padding: 1px 3px 0px 3px; }
td a, td a:link { color: #325C91; }
td a:visited, td a:hover { color:#4b8ada; }
a.adv:link, a.adv:visited, a.adv:hover, a.adv:active { color:#000000; font-weight:bold; }
/*img a:hover { background-position: -100px 0; }*/
.bighead { font-size:9px; letter-spacing: 40px; padding-top:14px; padding-bottom:20px;  }
a.bh:link, a.bh:visited, a.bh:hover, a.bh:active { color:#000000; text-decoration:none; CURSOR: help; }
sup { font-size:7px; letter-spacing: 20px; }
.micro { font-size: 0px; color:#edeffe; visibility:hidden;}
.nohits { padding: 30px; }
.news { font-family: tahoma, verdana, arial; font-size: 11px; letter-spacing: 1px; border: 1px dashed #666; padding:4px; margin:20px; display:none; }
</style>
<script language="javascript" type="text/javascript" src="JSFX_ImageZoom.js"></script>
<script language="javascript">
function info_pfi() {
	alert('this viewer was logged out, but previous login(s) were detected.  this is a list of people who have previously logged into myspace on the viewer\'s browser.  basically, this view was most likely one of these people.  it\'s kind of inaccurate, but hey, it\'s better than nothing.');
}
function info_unknown() {
	alert('this view could not be identified, but click on the ip address or the eyeball to attempt to identify it.');
}
function info_referrer() {
	alert('this is the page your visitor clicked on to reach your profile.  if it just says your page, that means javascript wasn\'t executed so it couldn\'t be identified.');
}
function delete_view(ip,date_time) {
	if (confirm("are you sure you want to permanently delete this view?")) {
		document.location = 'delete.php?ssusername=<?=$ssusername?>&ip='+ip+'&date_time='+date_time+'&o=<?=$o?>';
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


var OGnode, CurrentID;

function checkip(url,id) {
	var tr_id = 'tr_'+id;
	//save previous state of row	
	if (!CurrentID) {
		CurrentID = id;	
	} else {
		close_checkip(CurrentID);
	}
	OGnode = document.getElementById('mable').rows[id].cloneNode(true);	
	//firefox zoomed image hack
	OGnode.childNodes[0].innerHTML = OGnode.childNodes[0].innerHTML.replace('height="72" width="94"','height="34" width="44"');
	CurrentID = id;

	document.getElementById('mable').deleteRow(id);
	var x = document.getElementById('mable').insertRow(id);
	var y = x.insertCell(0);
	y.colSpan = 7;
	y.innerHTML = '<iframe id="if_'+id+'" width="100%" height="150" style="border:1px;border-style:dotted;border-right:none;border-left:none;" src="'+url+'"></iframe>';

}  
function close_checkip(id) {

	document.getElementById('mable').deleteRow(id);

	var row_ref = document.getElementById('mable').insertRow(id);
	
	for (i=0; i<OGnode.childNodes.length; i++) {
		//alert(OGnode.childNodes[i].innerHTML);
		var tdi = row_ref.insertCell(i);
		tdi.innerHTML = OGnode.childNodes[i].innerHTML;
	}
}
function close_checkip_update(id,new_friendid,new_username,new_img,note_opt) {
	
	if (note_opt == '') {
		OGnode.childNodes[0].innerHTML = '<a href="http://www.myspace.com/index.cfm?fuseaction=user.viewProfile&friendID='+new_friendid+'" id="'+id+'2"><img src="'+new_img+'" border=0 onmouseover="JSFX.zoomIn(this,8,50);" onmouseout="JSFX.zoomOut(this,8,50);" width=44 height=34></a>';
		OGnode.childNodes[1].innerHTML = '<a href="http://www.myspace.com/index.cfm?fuseaction=user.viewProfile&friendID='+new_friendid+'">'+new_username+'</a>';
	} else {
		OGnode.childNodes[1].innerHTML = note_opt;
	}
	//alert(OGnode.childNodes[3].innerHTML);
	//OGnode.childNodes[2].innerHTML = '<div style=color:#edeffe>(refresh the page to edit this again)</div>';
	//OGnode.childNodes[3].innerHTML = '&nbsp;'; OGnode.childNodes[4].innerHTML = '&nbsp;'; OGnode.childNodes[5].innerHTML = '&nbsp;'; OGnode.childNodes[6].innerHTML = '&nbsp;';
	
	close_checkip(id);
}
</script>
</head>
<body onLoad="MM_preloadImages('img/aff_mrlogover.gif','img/aff_skullover.gif','img/aff_mooseover.gif')">
<table border=0 width="100%" style="background-color: #dcdfec;">
	<tr>
		<td valign="top" width="234">
<? 
$browza = $_SERVER['HTTP_USER_AGENT'];
if ($subscribed > 0) { 
	if (strstr($browza,'MSIE')) $iespace='&nbsp;';
	?>
	<script language="javascript">
	function info_pro() {
		alert('you have spyspace enhanced! \n\ thank you for donating, kind sir or madam!')
	}
	</script>
	<div class=bighead><a href=# class=bh onClick="info_pro();">spyspace<?=$iespace?><sup>enhanced</sup></a></div>
<? } else { ?>

	<script type="text/javascript"><!--
google_ad_client = "pub-3257425409427069";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text";
google_ad_channel = "";
google_color_border = "dcdfec";
google_color_bg = "dcdfec";
google_color_link = "000000";
google_color_text = "333333";
google_color_url = "336699";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	
	
	
		</td>
		<td valign="top" align="left">
			&nbsp;
<? } ?>
		</td>
		<td align="right" height="50"> <a href="news.php" style="color:darkred;text-decoration:none"><b>1/14/08 - BYESPACE. CLOSING MARCH 1ST</b></a> | 
		<span style="font-size:9px"><b><?=$ssusername?></b>  &nbsp; <a href=login.php?u=<?=$ssusername?>>log out</a></span>
| 
<? if ($subscribed < 1) { ?>
	<a href="instructions.php?ssusername=<?=$ssusername?>">code instructions (7/31)</a> 
<? }else{ 
		if ($unk == 1) { $showhide = 'hide'; $unk_switch=0;}else{ $showhide = 'show'; $unk_switch=1;}?>
		
		<a href="?u=<?=$u?>&unk=<?=$unk_switch?>&o=<?=$o?>"><?=$showhide?> unknown views</a> | 
		
		<a href="instructions.php?ssusername=<?=$ssusername?>">code instructions (7/31)</a> 
<? } ?>

| <a href="news.php">news (1/14)</a> | <a href="faq.php">faq (8/1)</a> | <a href="donate.php"><b>donate</b></a><span style="font-size:5px"><br><br></span>

<? 
//show firefox ad for ie users
if (strstr($browza,'MSIE')) { ?>
	<script type="text/javascript"><!--
	google_ad_client = "pub-3257425409427069";
	google_ad_width = 110;
	google_ad_height = 32;
	google_ad_format = "110x32_as_rimg";
	google_cpa_choice = "CAAQ_-KZzgEaCHfyBUS9wT0_KOP143Q";
	//--></script>
	<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script>
<? } ?>

		</td>
	</tr>
	<tr>
		<td colspan="3">
			<table width="100%" border=0  style="background-color: #dcdfec;"><tr><td align="left" valign="middle"><?=$prev_link_str?></td>
			<td align="right" valign="top"><?=$next_link_str?></td></tr></table>
		</td>
	</tr>
</table>
<!-- google_ad_section_start(weight=ignore) -->
<table border="0" width="100%">
	<tr class="hdr">
		<td width="50">&nbsp;</td>
		<td width="50" nowrap>name</td>
		<td>ip address</td>
		<td>date/time</td>
		<td width=300 nowrap>browser</td>
		<td>came&nbsp;from&nbsp;<a href=# onClick="info_referrer(); return false;" class=bh style="font-weight:normal">[?]</a></td>
		<td>&nbsp;		
		</td>
	</tr>
	 <tbody id="mable">
<?php
if ($unk == 1) $hide_eyeballs_str = ''; else $hide_eyeballs_str = " AND friendid != '?' ";

//if the "next page" link is clicked, select all records.  otherwise, only select the last 5 days worth of tracks
//if (isset($o) && ($o > 0)) {
	$sql = "SELECT friendid, ip ,date_time,	DATE_FORMAT(date_time,'%m/%d/%Y %h:%i:%s %p') as date_time_formatted, browser, referrer, clipboard, username, img FROM track WHERE ssusername='$ssusername' $hide_eyeballs_str ORDER BY ssusername,date_time DESC LIMIT $o,30";
//} else {
//	$sql = "SELECT friendid, ip ,date_time,	DATE_FORMAT(date_time,'%m/%d/%Y %h:%i:%s %p') as date_time_formatted, browser, referrer, clipboard, username, img FROM track WHERE ssusername='$ssusername' $hide_eyeballs_str AND (DATE_SUB(CURDATE(),INTERVAL 5 DAY) <= date_time) ORDER BY ssusername,date_time DESC LIMIT $o,30";
//}

$result = mysql_query($sql);

if ($result){
	$cnt = mysql_num_rows($result);

	$c = 0;
	$i = 1;
	while ($userdata = mysql_fetch_object($result)) {
		$friendid = $userdata -> friendid;
		$ip = $userdata -> ip;
		$date_time_raw = $userdata -> date_time;
		$date_time = $userdata -> date_time_formatted;
		$browser = $userdata -> browser;
		$referrer = $userdata -> referrer;
		$clipboard = $userdata -> clipboard;
		$username = $userdata -> username;
		$img = $userdata -> img;
		
		$username = str_replace('<wbr/>','',$username);
		$username = htmlspecialchars($username);
		
		$referrer_txt = str_replace('http://','',$referrer);
		if (strlen($referrer_txt) > 42) { 
			$last_char = (strlen($referrer_txt) - 1); $start_char = ($last_char - 15);
			$after_dotdotdot = substr($referrer_txt, $start_char, $last_char);
			$referrer_txt = substr($referrer_txt,0,27);
			$referrer_txt = $referrer_txt . '...' . $after_dotdotdot;
		}
		if ($referrer == '') { 
			$referrer = '#(no referrer)';
			$referrer_txt = 'unknown';			
		}

		if ($username == '') $username = $friendid;

		$ipcheck_url = "check.php?ip=$ip&ssusername=$ssusername&rowid=$c&o=$o&date_time=".urlencode($date_time_raw);

		if (is_numeric($friendid) && ($friendid != -1)) {
		
			if ($img == '') $img = 'http://x.myspace.com/images/no_pic.gif';
			
			//usual identified hit
			$img_str = "<a href=\"http://www.myspace.com/index.cfm?fuseaction=user.viewProfile&friendID=$friendid\" id=\"c$c\"><img src=\"$img\" border=0 onmouseover=\"JSFX.zoomIn(this,8,50);\" onmouseout=\"JSFX.zoomOut(this,8,50);\" width=44 height=34></a>";
			if ($img == '') $img_str = '';
			$username_str = "<a href=\"http://www.myspace.com/index.cfm?fuseaction=user.viewProfile&friendID=$friendid\">$username</a>";
			//you may delete user edited records
			if ($clipboard == 'usr_edt') $username_str .= "&nbsp;<a href=\"javascript:delete_view('$ip','$date_time_raw')\" style=color:darkred;text-decoration:none; title=\"click the x to delete this view\">x</a>";
			
		} elseif(($friendid=='???')  && ($img!='http://x.myspace.com/images/no_pic.gif')) {
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
			} else { 
				$username_str = "logged out";
			}
		} else {
			//eyeball.  usually means only the image tracked, no js loaded
			// onmouseover=\"JSFX.zoomIn(this,8,50);\" onmouseout=\"JSFX.zoomOut(this,8,50);\" --removed
			$img_str = "<a href=\"$ipcheck_url\" onclick=\"checkip('$ipcheck_url','$c');return false\"><img src=\"img/eyecon.gif\" width=44 height=34 border=0></a>";
			if (($username == '') || ($username == '???') || ($username == '?')) $username = 'unknown';
			$username_str = $username.'&nbsp;<a href=# onClick="info_unknown(); return false;" class=bh style="font-weight:normal">[?]</a>';
			$username_str = $username_str. "&nbsp;<a href=\"javascript:delete_view('$ip','$date_time_raw')\" style=color:darkred;text-decoration:none; title=\"click the x to delete this view\">x</a>";

		}
		
		//make browser string a little shorter
		$browser = str_replace('Mozilla/4.0 ','',$browser);
		$browser = str_replace('Mozilla/5.0 ','',$browser); 
			
		//(row scrunched together for stupid cross-browser dom ajax whatever)
		echo("<tr $rowcolor id=\"tr_$c\"><td>$img_str</td><td>$username_str</td><td><a href=\"$ipcheck_url\" onclick=\"checkip('$ipcheck_url','$c');return false\">$ip</a></td><td>$date_time</td><td>$browser</td><td><a href=\"$referrer\">$referrer_txt</a></td><td>");
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
				
	} //while

} //result
else {
	die( "ERROR: " . mysql_error() );
}

if ((($cnt == 0) && ($o == 0)) || ($c == 0)) {
	if ($totalviews == 0) {
		echo "<div class=nohits>no hits yet. if you aren't sure whether you put the code into your page correctly, <a href=http://spyspace.cc/instructions.php?ssusername=$ssusername>here</a> are the instructions again.  <br><br>you can test it yourself by logging into myspace and viewing your own profile, and then coming back to this page.  <br><br>still not working?  read the <a href=faq.php>faq</a>.</div>";
	} else {
		echo "<div class=nohits>no new identified hits within the past 3 days. ";
		if ($subscribed > 0) echo "<a href='?u=".$ssusername."&unk=1'>click here</a> to view unknown hits."; else echo "go to the <a href='?u=".$ssusername."&o=1'>next page</a> to see older hits.";
		echo "<br><br>has your code been broken?  take a look at the <a href=news.php>news</a>.</div>";
	}
}
?>
</tbody>
</table>
<!-- google_ad_section_end(weight=ignore) -->
<table width="100%" border=0><tr><td align="left" valign="middle"><?=$prev_link_str?></td>
<td align="right" valign="middle"><?=$next_link_str?></td></tr></table>
<table width="100%" border=0><tr><td>

<a href="http://www.logjamming.com"><img src="img/aff_mrlog.gif" alt="hosted by logjamming.com" title="hosted by logjamming.com" name="mrlog" width="42" height="51" border="0" id="mrlog" onMouseOver="MM_swapImage('mrlog','','img/aff_mrlogover.gif',1)" onMouseOut="MM_swapImgRestore()" /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.gasmacaroni.com/gas.pcgi"><img src="img/aff_skull.gif" alt="aquainted with gas macaroni" title="aquainted with gas macaroni" name="skull" width="40" height="49" border="0" id="skull" onMouseOver="MM_swapImage('skull','','img/aff_skullover.gif',1)" onMouseOut="MM_swapImgRestore()" /></a>&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.standoffish.com"><img src="img/aff_moose.gif" alt="associated with standoffish" title="associated with standoffish" name="moose" width="58" height="51" border="0" id="moose" onMouseOver="MM_swapImage('moose','','img/aff_mooseover.gif',1)" onMouseOut="MM_swapImgRestore()" /></a>

</td>
<td>
<div style="text-align:right">
<img src="img/trans.gif" width=1 height=1 border=0>
<script type="text/javascript"><!--
google_ad_client = "pub-3257425409427069";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text";
google_ad_channel ="";
google_color_border = "EDEFFE";
google_color_bg = "EDEFFE";
google_color_link = "000000";
google_color_url = "336699";
google_color_text = "333333";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
</td></tr></table>


<div class="micro">

TERMS OF SERVICE

You agree to use the spyspace tracker at your own risk. This service is provided on an "as is" and "as available" basis. You agree that you have made your own determination regarding the usefulness of the service. We disclaim all warranties including, but not limited to, warranties of merchantability and fitness for a particular purpose.

We are not liable for damages, direct or consequential, resulting from your use of the service, any failure to provide service, suspension of service, or termination of service. We do not guarantee the availability of the service. You agree not to hold us responsible for data loss or interruption of service of any kind.

YOU AGREE TO DEFEND, INDEMNIFY AND HOLD US HARMLESS FROM AND AGAINST ANY AND ALL CLAIMS, LOSSES, LIABILITY COSTS AND EXPENSES (INCLUDING BUT NOT LIMITED TO ATTORNEY'S FEES) ARISING FROM YOUR VIOLATION OF THIS AGREEMENT OR ANY THIRD-PARTY'S RIGHTS, INCLUDING BUT NOT LIMITED TO INFRINGEMENT OF ANY COPYRIGHT, VIOLATION OF ANY PROPRIETARY RIGHT AND INVASION OF ANY PRIVACY RIGHTS. THIS OBLIGATION SHALL SURVIVE ANY TERMINATION OF THIS AGREEMENT. OUR LIABILITY WILL NOT EXCEED THE PURCHASE PRICE OF THE SERVICES.

Spyspace is not intended to "hack" or undermine myspace or its users.  It is not spyware, nor does it install spyware.  It is web-based and installs nothing to your hard drive.  No mailing addresses, phone numbers, last names, login information, or cookies are collected by the tracker.  The contents of the spyspace database will never be sold to a third party or used to spam spyspace/myspace users.  Your email will only be used for critical spyspace-related announcements, or just to say "what's up" if we are feeling lonely.  The "we" being used in this terms of service is "the royal we." The spyspace database's integrity will be upheld to the best of our abilities; however, if the database's security is compromised, you agree to not hold us accountable.  We reserve the right to update these terms of service in the future.  Spyspace is not Skynet, that's from Terminator 2.  The tracker is only intended for entertainment/educational purposes; but never for edutainment purposes.  Use of the tracker is at your own risk, and the creator of the tracker will not be held liable for any situations that result from your use of the tracker.  Be cool, okay?  Just be cool.

Disclaimer for Troubled Teens: Myspace is bad for you, and spyspace makes it worse. If you are the obsessive type, you would be better off obsessing over something useful instead; like getting really good at beekeeping, or aquarium ownership/maintenance, or gun repair. Actually this thing will probably be shut down within a few hours, so whatever.

Spyspace is not affiliated with myspace.  Having a tracker on your page might violate myspace's terms of service, and you might hear rumors of accounts being deleted for having them.  I don't know why they would want to do that, though.  No support is offered at this time, but send email to spyspace@gmail.com if you have to.


</div>

<br>
<?
$rando = rand(0,1);
if ($rando == 0) $strperson = "girl"; else $strperson = "guy";
?>
*remember:  just because someone looks at your profile doesn't mean they are stalking you.  some people just like clickin' around.  <br>that one <?=$strperson?> is totally stalking you though.
<br><br>
spyspace is not endorsed by or affiliated with myspace. <a href="tos.php" style="color:#000000;">terms of service</a>
</body>
</html>