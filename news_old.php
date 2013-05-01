<? 
include 'encrypt.php';

$userinfo_enc = $_COOKIE['ui'];
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$subscribed = $userinfo_array[3];
if (($subscribed < 1) || (!$subscribed)) header("Location: sorry.php"); 
?>
<html>
<head>
<title>spyspace - news</title>
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
<script language="javascript">
// Quicktime Detection  v1.0
// documentation: http://www.dithered.com/javascript/quicktime_detect/index.html
// license: http://creativecommons.org/licenses/by/1.0/
// code by Chris Nott (chris[at]dithered[dot]com)


var quicktimeVersion = 0;
function getQuicktimeVersion() {
   var agent = navigator.userAgent.toLowerCase(); 
   
   // NS3+, Opera3+, IE5+ Mac (support plugin array):  check for Quicktime plugin in plugin array
   if (navigator.plugins != null && navigator.plugins.length > 0) {
      for (i=0; i < navigator.plugins.length; i++ ) {
         var plugin =navigator.plugins[i];
         if (plugin.name.indexOf("QuickTime") > -1) {
            quicktimeVersion = parseFloat(plugin.name.substring(18));
         }
      }
   }
   
   // IE4+ Win32:  attempt to create an ActiveX object using VBScript
   else if (agent.indexOf("msie") != -1 && parseInt(navigator.appVersion) >= 4 && agent.indexOf("win")!=-1 && agent.indexOf("16bit")==-1) {
     document.write('<scr' + 'ipt language="VBScript"\> \n');
      document.write('on error resume next \n');
      document.write('dim obQuicktime \n');
      document.write('set obQuicktime = CreateObject("QuickTimeCheckObject.QuickTimeCheck.1") \n');
      document.write('if IsObject(obQuicktime) then \n');
      document.write('   if obQuicktime.IsQuickTimeAvailable(0) then \n');
      document.write('      quicktimeVersion = CInt(Hex(obQuicktime.QuickTimeVersion) / 1000000) \n');
      document.write('   end if \n');
      document.write('end if \n');
      document.write('</scr' + 'ipt\> \n');
  }

   // Can't detect in all other cases
   else {
      quicktimeVersion = quicktimeVersion_DONTKNOW;
   }

   return quicktimeVersion;
}

quicktimeVersion_DONTKNOW = -1;

var quicktimeVersion = getQuicktimeVersion();
</script>
</head>
<body>
spyspace news
<br /><br /><br />

<hr />
11/14/06 6:45 pm
<br /><br />
update: even if enableJSURL="false" has been added to the code, the tracker still seems to work.  i'll bet the security flaw won't be fixed until everybody downloads an update to quicktime.  haw haw.  i'm still not going to touch my profile for now, though.
<br><br><br><br>


<hr />
11/14/06 4:05 pm
<br /><br />
if spyspace is still working for you, it would be advised to not update your myspace profile.  i just noticed that enableJSURL="false" was added to the code when i tried to preview it, which will make spyspace stop working.  please hold off on updating any section of your profile while i try to find a workaround.  
<br><br>
want to check if your page is still ok?  <br>
1.  go to your page, right click anywhere on the background and choose "view source"<br>
2.  press ctrl+f, type in enableJSURL, hit enter<br>
3.  if you do find enableJSURL="false" in your spyspace code, you might be screwed for now.  sorry!  i'll figure something out, but this is kind of the nature of this thing.  it's constantly on the verge of falling apart/being blocked, and i have to constantly fix it.<br><br>
p.s. enableJavaScript="false" is ok, the code still works with that
<br><br><br><br>

<hr />
11/10/06 4:26 pm
<br /><br />
my email box has gone silent, so i assume it is working for most of you.  remember that spyspace operates off of a hack, and it's not going to track 100% of the people that view your page.  the current method uses a security flaw in quicktime, and if the viewer of your page doesn't have quicktime, it won't work.  most people have quicktime, though.
<br><br>
for people seeing the "Click to run an ActiveX control on this webpage" dialogue, it's because you're using internet explorer or the aol browser, and the warning happens for all quicktime movies, and i can't do anything about it.  you're probably used to seeing it all the time.  you can disable it if it bothers you, though.  read all about it here: <a href="http://www.google.com/search?lr=&ie=UTF-8&oe=UTF-8&q=%22Click%20to%20run%20an%20ActiveX%20control%20on%20this%20webpage%22">http://www.google.com/search?lr=&ie=UTF-8&oe=UTF-8&q=%22Click%20to%20run%20an%20ActiveX%20control%20on%20this%20webpage%22</a>
<br><br><br><br>


<hr />
11/08/06 7:59 pm
<br /><br />
please try the new code and tell me how it grabs you.
<br><br>
p.s. whoa, i just noticed people are donating already.  aw shucks, you didn't have to go and do that.  you will be remembered for your generosity, and i sincerely thank you.  also i hope the donate page is still working, i haven't tested it lately.  (update: seems to be working fine)
<br><br><br><br>

<hr />
11/07/06 11:01 pm
<br /><br />
actually, nevermind.  don't change your profiles.  take the code out if it's causing the redirect.  i'll report back soon with a new code, hopefully.  isn't this exciting.
<br><br>
11:04 - ok, it's not the code, or the amount of junk on your profile.  it's because of the length of your spyspace username, and because i'm an idiot.  i think people with usernames over 8 characters are the ones having trouble.  i'm looking into it.
<br><br><br><br>

<hr />
11/07/06 9:09 pm
<br /><br />
the 404 redirect bug might be related to having a bunch of crap on your page (movies, music, rotating cubes from the future).  if your page is redirecting, please remove the code if you haven't already.  or if you really want to be a trooper, you can try removing some of the stuff on your page, and let me know if it fixes it.  all of my test pages have been kind of skimpy , which is why i haven't been able to replicate the error until just now.  i'm going to work on finding a better method, because i realize a lot of people have a lot of crap on their pages.  
<br><br>
special thanks to KILLERPROMQUEEN for providing the first example of the bug that i could replicate on my computer, and to ARGABLARG for pointing out that it occurs once the scrollbar is moved.
<br><br>
there's a lot more of you emailing me now, so sorry if i don't get right back to you.  i am only but one dude.
<br><br><br><br>

<hr />
11/06/06 8:15 pm
<br /><br />
ok, if your profile page is redirecting to a 404 and showing the javascript code after you update your profile, please make sure you copy and paste this here red text and email it to me:<br>
<font color=darkred><?=$_SERVER['HTTP_USER_AGENT'];?> | qt:<script>document.write(quicktimeVersion);</script></font>  <br>
this seems to be a popular bug, and i think i'm close to figuring it out.  but i'm done for today.  thank you, i will see you tomorrow.
<br><br><br><br>

<hr />
11/05/06 8:41 pm
<br /><br />
hm, i think the email i sent out to "pro" users only reached like 18 of you.  we're off to a good start.  but, it might be for the best because it seems like there are some bugs.  anyhow, if you previously donated, you should be able to log in and install the new code.  please email me if you see anything screwy going on, and tell me what browser and operating system you're using by copy/pasting this into the email: 
<font color=darkred><?=$_SERVER['HTTP_USER_AGENT'];?> | qt:<script>document.write(quicktimeVersion);</script></font>.  thanks.
<br><br><br><br>
<hr />
11/04/06 3:14 am
<br /><br />
wow, within days of connecting spyspace with the first method, the code was filtered by myspace.  it's ok now though, found another one.  i'm going to let the donators from the last time around beta test it for a little while before i open up registration.  i'll send an email out real soon-like.  
<br><br><br><br>
<hr />
10/31/06 6:03 pm
<br /><br />
spyspace returns.  much like the mighty phoenix, but in a lot of ways not really, now that i think about it.  

<br><br><br>
<a href="news_older.php">older news</a>
<br><br>

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2008550; 
var sc_invisible=1; 
var sc_partition=18; 
var sc_security="1d5f32b5"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c19.statcounter.com/counter.php?sc_project=2008550&java=0&security=1d5f32b5&invisible=1" alt="website hit counter" border="0"></a> </noscript>
<!-- End of StatCounter Code -->