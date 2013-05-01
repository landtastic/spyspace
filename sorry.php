<?php
include 'db.php';
include 'encrypt.php';

$userinfo_enc = $_COOKIE['ui'];
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$ssusername = $userinfo_array[0];
$ssusername = htmlspecialchars($ssusername);
$ssusername = mysql_real_escape_string($ssusername);
$password = $userinfo_array[1];
$block = $userinfo_array[2];
$subscribed = $userinfo_array[3];
?>
<html>
<head>
<title>spyspace - myspace tracker</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
td { font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; color:#666666; }
input { border:1px solid #cccccc; font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; }
A:link,A:visited,A:active { color:#222222; }
A:hover { color:#555555; }
.explain { font-size: 11px; color:#ffffff; }
.explain2 { font-size: 11px; color:#999999; }
.disclaim { font-size: 11px; color:#999999; text-align:left; width:483px; }
.head { font-size:12px; letter-spacing: 5px; }
.bighead { font-size:13px; letter-spacing: 64px; padding-top:50px; padding-bottom:30px; }
.termsbox { width:483px; height:120px; overflow:auto; border:1px solid #cccccc; text-align:left; padding:5px; }
.micro { font-size: 0px; color:#ffffff; visibility:hidden; height:1px;}
sup { font-size: 7px; }
</style>
<script language="javascript">
	function classy(domID,swtch) {
		if (swtch == 1) document.getElementById(domID).className = "explain2";
		if (swtch == 0) document.getElementById(domID).className = "explain";
	}
</script>
</head>
<body bgcolor="#dcdfec" leftmargin="0" topmargin="0" bottommargin="0" rightmargin="0" marginwidth="0" marginheight="0">
<!-- google_ad_section_start(weight=ignore) -->
<table width="900" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="89" background="img/border_left.gif"><img src="img/trans.gif" width="89"></td>
    <td align="center" valign="top" bgcolor="#FFFFFF">
		<div class="bighead">&nbsp;spyspace</div><br>
		<table width="561" align="center" border=0><tr><td>
<br><br><br><br>

sorry, this page is currently only available to donors.  check the <a href="news.php">news</a> page for more information.<br><br>you can donate <a href="donate.php">here</a>.  before you donate please consider the following:  <b style="color:red;">the code is currently blocked.  that means that if you donate/upgrade right now and try to install the code, it won't work.  you probably don't want to donate right now.  i'm on the lookout for a new code, hopefully new users can install it again soon.</b><!--<br>1. the code won't work with music/artist pages.  <br>2. if you have a heavily customized profile, the code might not work, or it might mangle your html.<br> 3. the code will be blocked eventually.--><br><br>if you did donate and you're still seeing this page, try <a href="login.php?u=<?=$ssusername?>">logging out and logging in</a> again.  if that doesn't work, email me with your username and i'll upgrade you.  


		</td></tr></table>
<!-- google_ad_section_end(weight=ignore) -->
		


<!-- google_ad_section_start -->
<div class="micro">
myspace fun dating the dating scene am i right here people social networking bands music indie emo punk hip hop funny tshirts t-shirts comedy farts video games my chemical romance man what else do you lousy kids like uhhh rock music musical instruments bands oh wait i already said that rap new wave the 80s hey remember the 80s? i'll bet you don't you little twerp haircuts fashion jeans uh dungarees you don't call them dungarees anymore do you. well back in my day, we called them denim trousers and we rode the sweet pickles bus to school and we respected our elders and we adorned ourselves with only the finest silks and spices from the orient god why won't the stupid ads show anything besides boring stuff that no one's going to click on?  what's going on here, exactly?

MySpace
From Wikipedia, the free encyclopedia.
Jump to: navigation, search
MySpace logo

MySpace is a free social networking website that uses the Internet for online communication through an interactive network of photos, blogs, user profiles, groups, and an internal email system. According to Alexa Internet, MySpace is the world's seventh most popular English language website [1].
Contents
[hide]

    * 1 MySpace culture
    * 2 Criticism and problems
          o 2.1 Downtime and slow running
          o 2.2 Customization
          o 2.3 User directory searches
          o 2.4 Security and spyware issues
          o 2.5 Bullying
          o 2.6 Groups
    * 3 Celebrations
    * 4 See also
    * 5 References
    * 6 External links

[edit]

MySpace culture

Due to the popularity of the website (over 45 million users), it has been suggested that a unique culture, mostly within the alternative scene, is developing within the MySpace network. It appeals to young adults, and because of the interactivity between users, many people also discover new groups of people or bands by looking through other people's profiles and their lists of friends and contacts. Additionally, the easy communication and built-in focus on pictures has helped MySpace become a haven for the creation of new trends and the dissemination of current ones.
[edit]

Criticism and problems
[edit]

Downtime and slow running

Due to the high traffic and the constant registration of new members, the servers have undergone frequent maintenance to speed up the system. Ironically, all the maintenance had a tendency to slow down the site even more. Additionally, new features to the site can assist in MySpace running very slowly. The recent ability of a user to add a streaming song off of a band's MySpace profile into their own is probably the most prominent example.
[edit]

Customization

Many problems also stem from MySpace being set up so that anyone can customize the layout and colors of their profile page with virtually no restrictions. As most MySpace users are not professional web developers, this often causes a massive deal of confusion and disorientation. Poorly constructed MySpace profiles have been known to freeze web browsers due to malformed CSS coding, and as a result of users placing many high bandwidth objects such as videos and flash in their profiles, often hotlinked from other websites. It is also possible that videos on profiles that use Windows Media Player could corrupt the program itself if it is simultaneously playing another file from the user's computer.
[edit]

User directory searches

MySpace does not provide an efficient, streamlined ability to search for people, but does allow a browse feature to see who or what is using the site in your general area. In terms of volume of people, MySpace can deliver. However when searching for specific people, searching can be extremly difficult as the database for MySpace was not designed for specific searches. Additionally, some users place inaccurate information in their profiles, compounding the inefficiency.
[edit]

Security and spyware issues

In July 2005 Kuro5hin reported a cross site scripting (XSS) vulnerability on MySpace [2]. In October 2005, a user "Samy" exploited this vulnerability creating a worm which added over one million people to his buddy list, and forced MySpace to go offline for maintenance [3]. It has also been reported that a similar vulnerability could potentially be used to access another user's hard drive. The html based comments function of profiles has also been a source of amusement for hackers and trolls, as it allows the embedding of malicious flash files into a person's profile, causing the computer of anybody viewing the profile to freeze. Such assaults are widely carried out, most notably by members of Interflop and other potentially offensive humour forums or sites. There have been a number of fixes by MySpace to solve this problem, but new methods are surfacing all the time. These types of sites generally exist to collect their users information and either directly market or sell any personal obtained information.
[edit]

Bullying

Whilst doing so may be in violation of MySpace agreements, little is done to eliminate groups dedicated to the slandering of racial minorities, and bullying remains a problem. Many schools in the US have begun to restrict access to MySpace from school computers, because it has become "such a haven for student gossip and malicious comments" [4].
[edit]

Groups

Groups have gone under scrutiny by the creators of the site, when certain members were posting offensive photos, which was a direct violation of the site's rules. Attempts are being made every day to deal with these types of groups, and in the end, the hope is that it remains free of any sort of offensive material. Other threats that have emerged within groups, and the site problems in general are spammers and trolls. The trolls usually tend to vandalize the forums with the overuse of HTML.
[edit]

Celebrations

Tom Anderson and the other creators have also hosted many parties in Hollywood, Miami, Orlando, New York City, Chicago, Boston, San Francisco, Seattle, and Hawaii to support the site.
[edit]

See also

    See also: List of social networking sites

[edit]

References

   1. ^  Alexa Internet Alexa Web Search - top 500 English language websites. Retrieved January 4, 2006.
   2. ^  CNN, May 31, 2001. Online storage firm shutters file depot. Retrieved December 29, 2005.
   3. ^  Intermix Media, July 18, 2005. News Corporation to Acquire Intermix Media, Inc.. Retrieved December 29, 2005.
   4. ^  Kuro5hin, July 17, 2005. MySpace: A Place for Dolts. Retrieved December 29, 2005.
   5. ^  Slashdot, October 14, 2005. Cross-Site Scripting Worm Floods MySpace. Retrieved December 29, 2005.
   6. ^  Curriculum Review, October 2005. Schools race to restrict MySpace.

[edit]

External links

    * MySpace.com Website
    * Interview with MySpace.com co-founder Tom Anderson
    * Interview with MySpace.com co-founder Chris DeWolfe
    * MySpace Invaders -- a radio segment from WBUR in Boston's "Here & Now"
    * The MySpace Generation -- from Business Week Online

</div>
<!-- google_ad_section_end -->

<br><br><br><br><br><br>
<script type="text/javascript"><!--
google_ad_client = "pub-3257425409427069";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text_image";
google_ad_channel ="";
google_color_border = "FFFFFF";
google_color_bg = "FFFFFF";
google_color_link = "666666";
google_color_url = "CCCCCC";
google_color_text = "999999";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>



		</td>
    <td width="89" background="img/border_right.gif"><img src="img/trans.gif" width="89"></td>
  </tr>
</table>

</body>
</html>