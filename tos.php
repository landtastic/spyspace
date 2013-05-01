<? 
include 'encrypt.php';

error_reporting(E_ALL ^ E_NOTICE);

$userinfo_enc = $_COOKIE['ui'];
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$subscribed = $userinfo_array[3];
//if (($subscribed < 1) || (!$subscribed)) header("Location: sorry.php"); 
?>
<html>
<head>
<title>spyspace - terms of service</title>
<style>
* { font-family:verdana; font-size:11px; }
body { background-color: #edeffe; }
.hdr td { background-color: #e9ebfa; font-weight:bold; }
.odd td { background-color: #e9ebfa; }
table { border-collapse:collapse; border: 0px solid black; background-color: #edeffe; }
table tr:hover td { background-color: #dcdfec; }
td, th { padding: 1px 3px 0px 3px; }
td a, td a:link { color: #325C91; }
td a:visited, td a:hover { color:4b8ada; }
a.adv:link, a.adv:visited, a.adv:hover, a.adv:active { color:#000000; font-weight:bold; }
img a:hover { background-position: -100px 0; }
.bighead { font-size:9px; letter-spacing: 40px; padding-top:14px; padding-bottom:20px;  }
a.bh:link, a.bh:visited, a.bh:hover, a.bh:active { color:#000000; text-decoration:none; CURSOR: help; }
sup { font-size:7px; letter-spacing: 30px; }
.micro { font-size: 0px; color:#edeffe; visibility:hidden;}
.nohits { padding: 30px; }
/*img { width:50%; height:50%px; }*/
.news { font-family: tahoma, verdana, arial; font-size: 11px; letter-spacing: 1px; border: 1px dashed #666; padding:4px; margin:20px; display:none; }
hr { height:1px; }
</style>
</head>
<body>
TERMS OF SERVICE
<p>
You agree to use the spyspace tracker at your own risk. This service is provided on an "as is" and "as available" basis. You agree that you have made your own determination regarding the usefulness of the service. We disclaim all warranties including, but not limited to, warranties of merchantability and fitness for a particular purpose.
<p>
We are not liable for damages, direct or consequential, resulting from your use of the service, any failure to provide service, suspension of service, or termination of service. We do not guarantee the availability of the service. You agree not to hold us responsible for data loss or interruption of service of any kind.
<p>
YOU AGREE TO DEFEND, INDEMNIFY AND HOLD US HARMLESS FROM AND AGAINST ANY AND ALL CLAIMS, LOSSES, LIABILITY COSTS AND EXPENSES (INCLUDING BUT NOT LIMITED TO ATTORNEY'S FEES) ARISING FROM YOUR VIOLATION OF THIS AGREEMENT OR ANY THIRD-PARTY'S RIGHTS, INCLUDING BUT NOT LIMITED TO INFRINGEMENT OF ANY COPYRIGHT, VIOLATION OF ANY PROPRIETARY RIGHT AND INVASION OF ANY PRIVACY RIGHTS. THIS OBLIGATION SHALL SURVIVE ANY TERMINATION OF THIS AGREEMENT. OUR LIABILITY WILL NOT EXCEED THE PURCHASE PRICE OF THE SERVICES.
<p>
Spyspace is not intended to "hack" or undermine myspace or its users.  It is not spyware, nor does it install spyware.  It is web-based and installs nothing to your hard drive.  No mailing addresses, phone numbers, last names, login information, or cookies are collected by the tracker.  The contents of the spyspace database will never be sold to a third party or used to spam spyspace/myspace users.  Your email will only be used for critical spyspace-related announcements, or just to say "what's up" if we are feeling lonely.  The "we" being used in this terms of service is "the royal we." The spyspace database's integrity will be upheld to the best of our abilities; however, if the database's security is compromised, you agree to not hold us accountable.  We reserve the right to update these terms of service in the future.  Spyspace is not Skynet, that's from Terminator 2.  The tracker is only intended for entertainment/educational purposes; but never for edutainment purposes.  Use of the tracker is at your own risk, and the creator of the tracker will not be held liable for any situations that result from your use of the tracker.  Be cool, okay?  Just be cool.
<p>
Disclaimer for Troubled Teens: Myspace is bad for you, and spyspace makes it worse. If you are the obsessive type, you would be better off obsessing over something useful instead; like getting really good at beekeeping, or aquarium ownership/maintenance. Actually this thing will probably be shut down within a few hours, so whatever.
<p>
Spyspace is not affiliated with myspace.  Having a tracker on your page might violate myspace's terms of service, and you might hear rumours of accounts being deleted for having them.  I don't know why they would want to do that, though.  No support is offered at this time, but send email to spyspace@gmail.com if you have to.

<br><br><br><br><br>
<img src="img/trans.gif" width=1 height=1 border=0>
<script type="text/javascript"><!--
google_ad_client = "pub-3257425409427069";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text_image";
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