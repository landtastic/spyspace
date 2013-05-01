<? 
include 'encrypt.php';

error_reporting(E_ALL ^ E_NOTICE);

$userinfo_enc = $_COOKIE['ui'];
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$ssusername = $userinfo_array[0];
$subscribed = $userinfo_array[3];
//if (($subscribed < 1) || (!$subscribed)) header("Location: sorry.php"); 
?>
<html>
<head>
<title>spyspace - frequently asked questions</title>
<style>
td { font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; color:#666666; }
input { border:1px solid #cccccc; font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; }
A:link,A:visited,A:active { color:#222222; }
A:hover { color:#555555; }
.explain { font-size: 11px; color:#ffffff; }
.explain2 { font-size: 11px; color:#999999; }
.disclaim { font-size: 11px; color:#999999; text-align:left; width:483px; }
.head { font-size:12px; letter-spacing: 5px; }
.foot { font-size: 11px; color:#999999; }
.bighead { font-size:13px; letter-spacing: 64px; padding-top:50px; padding-bottom:30px; }
.termsbox { width:483px; height:120px; overflow:auto; border:1px solid #cccccc; text-align:left; padding:5px; }
.micro { font-size: 0px; color:#ffffff; visibility:hidden; height:1px;}
</style>
</head>
<body bgcolor="#dcdfec" leftmargin="0" topmargin="0" bottommargin="0" rightmargin="0" marginwidth="0" marginheight="0">
<!-- google_ad_section_start(weight=ignore) -->
<table width="900" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="89" background="img/border_left.gif"><img src="img/trans.gif" width="89"></td>
    <td align="center" valign="top" bgcolor="#FFFFFF">
		<div class="bighead">&nbsp;spyspace</div><br>
		<table width="501" align="center" border=0>
			<tr>
							<td>
							<script type="text/javascript"><!--
							google_ad_client = "pub-3257425409427069";
							google_ad_width = 468;
							google_ad_height = 60;
							google_ad_format = "468x60_as";
							google_ad_type = "text_image";
							google_ad_channel = "";
							google_color_border = "FFFFFF";
							google_color_bg = "FFFFFF";
							google_color_link = "666666";
							google_color_text = "999999";
							google_color_url = "CCCCCC";
							//--></script>
							<script type="text/javascript"
							  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
							</script>
							<br>
			frequently asked questions
			<br><br><br>
<b>will registration ever be open again?  will there ever be another working code?</b>
<br><br>
i don't know, probably not.  if you broke your code, or you never signed up while spyspace was working, you are out of luck.  it still works for people who got their code in and didn't touch it.  mine still works, i don't know what your problem is.
<br><br><br>
<b>my spyspace isn't working!  </b>
<br><br>
(the following is no longer relevant, as there is no current working code)
<br><br>
<del>first make sure you've removed any previous tracker code.  uninstall all of the code in the schools section using <a href="http://editprofile.myspace.com/index.cfm?fuseaction=profile.editsafeschool">safe mode</a>.  you must delete the entire section and start from scratch, don't edit it.  then re-install the code, following the instructions carefully.  that's all i can tell you.  sorry, i can't do it for you!  i know the code is kind of complicated this time, but get one of your nerd friends to do it for you if you can't get it.
<br><br>
also the code doesn't work on artist pages, and if you have a bunch of crazy customized html it might mangle your page or not work at all.  also, if you have a private profile, the only people that will be tracked are your friends.</del>
<br><br><br>

<b>all i've got are the stupid eyeballs!  i hate you!  </b>
<br><br>
that means your main code isn't installed right.  see above for how to remove all of the code and re-install it from scratch.  also, when the code gets blocked, it will go to all eyeballs.  these are better than nothing, as they at least allow you to identify people that have previously been tracked by spyspace.
<br><br><br>

<b>i donated, but i didn't get the enhanced upgrade!</b>
<br><br>
first, make sure you've logged out and logged in to activate enhanced.<br><br>
if you used a credit card instead of paypal, there's a button at the end of the process that says "click here to upgrade your account," or something.  if you missed it, or if for some other reason the upgrade failed, email me at spyspace@gmail.com with your username.  please don't email me about anything else.  
<br><br><br>
<b>i'm trying to remove my previous tracker code, but the networking section won't let me!  </b>
<br><br>
use safe mode to delete the networking section:  
<a href="http://editprofile.myspace.com/index.cfm?fuseaction=profile.editsafenetworking">http://editprofile.myspace.com/index.cfm?fuseaction=profile.editsafenetworking</a>
<br><br><br>
<b>can i use spyspace on music/artist pages?  </b>
<br><br>
not currently, sorry.
<br><br><br>
<b>how can i delete my account?  </b>
<br><br>
just remove the code from your profile.  
<br><br><br>
<b>i can't log in, even though i know i'm using the right username and password. </b>
<br><br>
try deleting your cookies, try a different browser, or go to the alternate url:  <a href="http://spyspace.standoffish.com">http://spyspace.standoffish.com</a>
			<br><br><br>
			<b>what is spyspace?</b>
			<br><br>
			this is a thing i came up with in june of 2005 that allows one to see who, specifically, is viewing their myspace profile.  it displays photo, name, time/date, ip address, browser, and the page your visitor came from.  i kept it to myself and a few friends for a while, but decided to release it into the wild to see what would happen, and because i ceased caring about who was looking at my myspace profile.  i assumed it would be immediately blocked once it was discovered, but that took a little longer than expected.  
			<br><br>
			the demand for a myspace tracker was pretty large as it turned out, and the server it was on promptly exploded.  i couldn't keep registration open, so naturally a plethora of myspace tracker sites sprang up, most of them scams.  of the ones that aren't scams, the majority of these sites only track members of their service.  if they ask you for your myspace friend id or myspace username, that's only so they can track YOU for other members of their service.  notice how spyspace works without needing your myspace info?  i try to run this site as ethically as possible for what it is, because i don't want no trouble.  that's why i try to keep the site running through ads and donations, rather than charging a mandatory fee for something that is experimental and unstable by nature (as of 7/31/07, a one-time donation is mandatory... check the news for more on this).  anyway, as long as other myspace tracker sites are allowed to exist, so will spyspace; and i'll make sure it's the best.
			<br><br>
			spyspace relies on a cross-site scripting hole in myspace, which can unfortunately also be used for more mischievous purposes.  for good reason, myspace will block these security flaws once they are known, but sometimes it can take time.  while spyspace is working, registration will be open, and you should collect as many identified hits to your profile as possible.  once the current method stops working, spyspace will be in hibernation to the outside world while i try and figure it out.  previous donors will be allowed to continue to use the service, which should still track previous viewers of their page, along with unidentified hits.
						<br><br><br>
			<b>what is standoffish?</b>
			<br><br>
			myspace tracking is great and all, but my true passion in life is creating <a href="http://www.standoffish.com">amateur internet videos</a> (not that kind).  the "spyspace.standoffish.com" domain is being phased out, please use <a href="http://spyspace.cc">spyspace.cc</a> to reach spyspace.
			
			
<br><br><br><br><br>
<script type="text/javascript"><!--
google_ad_client = "pub-3257425409427069";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text_image";
google_ad_channel = "";
google_color_border = "FFFFFF";
google_color_bg = "FFFFFF";
google_color_link = "666666";
google_color_text = "999999";
google_color_url = "CCCCCC";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
			
<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2113948; 
var sc_invisible=1; 
var sc_partition=19; 
var sc_security="f1a411b8"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c20.statcounter.com/counter.php?sc_project=2113948&java=0&security=f1a411b8&invisible=1" alt="website statistics" border="0"></a> </noscript>
<!-- End of StatCounter Code -->
			</td>
		</tr>
		  <tr>
			<td align="center" valign="top" bgcolor="#FFFFFF">
			<br><br><br><br>
				<div class="foot">spyspace is not endorsed by or affiliated with myspace. <a href="tos.php">terms of service</a></div>
			</td>
		  </tr>
	</table>

		</td>
    <td width="89" background="img/border_right.gif"><img src="img/trans.gif" width="89"></td>
  </tr>
</table>
</body>
</html>