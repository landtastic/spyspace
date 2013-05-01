<? 
include 'encrypt.php';

error_reporting(E_ALL ^ E_NOTICE);

$userinfo_enc = $_COOKIE['ui'];
if (!$userinfo_enc) exit('please <a href="login.php">log in</a> to view the news.');
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$ssusername = $userinfo_array[0];
$subscribed = $userinfo_array[3];
//if (($subscribed < 1) || (!$subscribed)) header("Location: sorry.php"); 
?>
<html>
<head>
<title>spyspace - news</title>
<style>
* { font-family:verdana; font-size:11px; }
body { background-color: #edeffe; }
.hdr td { background-color: #e9ebfa; font-weight:bold; }
.odd td { background-color: #e9ebfa; }
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
/*

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
*/
</script>
</head>
<body>
<?
$ref = @$_SERVER['HTTP_REFERER'];
if ($ref == '') $ref = "index.php?u=$ssusername";

$came_from = $_GET['came_from'];
if ($came_from == '') $came_from = $ref;
?>
<a href="<?=$came_from?>"><< back</a>
<br><br>
spyspace news
<br /><br /><br />

<hr />
1/14/09 6:28 pm
<br /><br />
Spyspace will cease to exist March 1st 2009.  C'mon, are you even using Myspace nowadays?  So don't donate any more, and thank you for keeping it alive all this time.  And major thanks to <a href="http://logjamming.com">Logjamming Hosting</a>, whose generosity was what really kept this site around for the last half year or so.  Blog with the Log!  
<br><br>
RIP SPYSPACE 6/2005-3/2009
<br><br>
<script language="javascript" src="http://www.pollverize.com/polls/9837.js"></script>
<noscript>You must enable JavaScript to vote in this poll from <a href="http://www.pollverize.com/" title="Free remotely hosted polls">Pollverize</a>.</noscript>
<br><br><br><br>

<hr />
6/5/08 11:56 am
<br /><br />
URGENT: Toobin' with George and Land is live tonight at 8:00 pm PST!  Please join us here:  <a href="http://toobin.tv">http://toobin.tv</a>
<br><br>
Also, I'm going to have to bother you for <a href="donate.php">donations</a> again soon.  Here is a graphical representation of the Spyspace server: <br>
<img src="http://www.trivalleytax.com/Portals/0/man_with_pockets_out.jpg"> <img src="http://www.fotosearch.com/thumb/IMP/IMP185/1525R-82238.jpg"> <img src="http://wwwdelivery.superstock.com/WI/223/1647/PreviewComp/SuperStock_1647R-118146.jpg" width=136 height=205>
<br><br><br><br>

<hr />
12/17/07 11:56 am
<br /><br />
hey you guys are doing good.  there's enough in the paypal account for 2 more months.  i'll bug you again about it when it's time.  until then, it never hurts to <a href="donate.php">donate</a>.  i won't be using the money for anything besides keeping spyspace up, but that means i'm not checking emails, or even thinking about fuckin spyspace.  brian over at <a href="http://logjamming.com">logjamming</a> is looking into moving us to a shared server to cut down on costs.  stay sweet.
<br><br><br><br>

<hr />
11/29/07 10:48 am
<br /><br />
hey guys that it's still working for: you need to <a href="donate.php">donate</a>. i'm sorry. the paypal account is drained once again, and i'm not paying $200 a month out of pocket. click on an ad or something too while you're at it.
<br><br>
guys it's not working for: there are no new prospects for a working code. all of the copycat websites pretty much ruined this forever. however, if you do see any myspace tracker sites with a working code, send it to me and i can hook spyspace up again.
<br><br>
thank you.
<br><br><br><br>

<hr />
8/9/07 10:46 am
<br /><br />
for clarification:  i'm only offering refunds to people that recently signed up, and never saw spyspace working in all its glory.  if you ask for a refund, and i look at your account and you have 11,000 hits that you've previously collected, i will ban your cheap ass from my site.  i gave you the miracle of myspace tracking and you can't even buy me a beer?  anyway, i've got an idea for a new code, but it would cause a pop-up window to launch every time someone looks at your page.  that's kind of annoying.  i'll keep looking.  
<br><br><br><br>

<hr />
8/4/07 2:30 pm
<br /><br />
now the code is definitely blocked.  if you got the code in before today and it's working, it should continue to work.  just don't edit your schools section.  if you donated within the last 24 hours, and never got the code working, i'll give you a refund.  i'll let you know once there's another code.  sigh.  
<br><br><br><br>

<hr />
8/2/07 4:27 pm
<br /><br />
ok, everything is fine.  registration is open again.  as you were.
<br><br><br><br>

<hr />
8/2/07 4:00 pm
<br /><br />
weird, now i'm getting hits again.  maybe that was a false alarm?  i'm going to keep registration closed for a little while until i figure this out.
<br><br><br><br>

<hr />
8/2/07 11:29 am
<br /><br />
aaaaaaaaaand it's blocked.  that was the most short-lived code ever.  is someone spying on spyspace?  give me a second, i'm gonna try to get it going again.  if you're only tracking eyeballs now, i know.  i know.  just give me a second, ok?
<br><br><br><br>

<hr />
7/31/07 2:52 pm
<br /><br />
there's a new code.  it tracks logged-in users of internet explorer, firefox, and safari, pretty reliably.  it doesn't work with artist or music profiles.  but it's a good one, and thank you to the kind soul who sent it to me.  i have decided it's in everyone's best interest to only make it available to donors.  if you haven't ever donated, your spyspace page will not be available any longer in a little bit.  sorry.
<br><br>
if you are one of spyspace's 65,000+ users, then you know that i'm doing the best i can to make this work, and i'm not trying to rip you off or scam you.  but the free/ad-based/donation model works against the myspace tracker.  i tried to keep it somewhat secret at first, because i understood that the more people who know about it, the sooner it dies.  it's hard to keep secrets on the internet.  a mandatory fee will keep the userbase smaller, and hopefully keep codes lasting a little longer.  
<br><br>
this was my experiment for myself, and then for my friends, and then for you.  i did not come up with this to make anonymous strangers rich -- people with the courage and the vision to see a good idea and say to themselves "that's a good idea.  now it's MY idea."  <!-- people not unlike myspace, a group of shitty business dudes (who tricked you into thinking they were young and hip) that saw friendster's concept, ripped it off and overtook them while their servers were slow... because their idea was almost too good.  regardless, i'm sure friendster ripped someone else off, and besides it's kind of a dumb name anyway.  not as dumb as "myspace" though, ugh i'm so tired of those two syllables.  would someone overthrow them already?-->  i started this gangster shit, and that's the motherfucking thanks i get?  don't mind me, i'm insane.
<br><br>
now look, i realize that i've been slacking and i'm sorry for that.  there just isn't much incentive for me to slave over a hot computer to facilitate your self-obsession, for jack squat.  it's been over two years now.  there is $400 in the spyspace paypal account right now, enough for exactly two more months of server costs.  all i'm asking is for a one time donation of $5.  trust me, my original idea was to make this monthly subscription-based, but i was unsure of the repercussions of that.  i didn't know myspace would allow it to exist, and i didn't want to charge people for something that could be gone at any moment.  i tried to give this to you for free for as long as i could, but in the words of <a href="http://www.google.com/search?q=zardoz">zardoz</a>, i have seen the future and it does not work.  
<br><br>
most of all, thank you to all of you that have donated before.  without you, none of this magic could have happened.  

<br><br><br><br>


<hr />
6/29/07 3:01 pm
<br /><br />
ok, i have moved and now have electricity and the internet, which are both amazing things.  don't ever let anyone tell you otherwise.  i will answer some emails now.  
<br><br>
i am hearing reports of the code being blocked without updating your profile, so sorry if that happened to you.  remember, spyspace enhanced users can still use the enhanced code even if your main code is blocked, although all of the views will show up as unknown at first, until you click on them.  

<br><br><br><br>

<hr />
6/22/07 8:54 pm
<br /><br />
i'm gonna be moving over the next couple of days so sorry if i don't return your emails.  

<br><br><br><br>


<hr />
6/18/07 11:14 am
<br /><br />
yep, the code is being blocked by myspace once again.  don't update your profile, or this line: <br><br>
`&gt;&lt;img src="http://205.134.170.241/img/trans.gif"  height=1 width=1 z=`
 <br><br>
will change to this: 
<br><br>
..&gt;&lt;img src="http://205.134.170.241/img/trans.gif"  height=1 width=1 z=..
<br><br>
and then your spyspace will stop working and you'll write me an email which i won't respond to.  registration will be closed until a new code is found.  

<br><br><br><br>


<hr />
5/25/07 1:29 pm
<br /><br />
yo, i don't know if you've noticed this today, but spyspace is ridiculously fast once again.  thanks to my server guy brian, and chris, who fixed a bogus query that was slowing everything down.  now onto fixing other things.  the code is still not blocked, and spyspace is flourishing.  tell your friends.  maybe i should send out emails or something, i think a lot of previous spyspace users aren't aware that there's a new code. 

<br><br><br><br>


<hr />
5/17/07 12:45 pm
<br /><br />
enhanced users:  to conserve server resources, i have hidden "unknown" eyeball views by default.  click the new link at the top that says "show unknown views" and the eyeballs will come back.  this is a temporary solution, but it seems to be helping, as i can actually get to the site today.  thank you for bearing with us.

<br><br><br><br>

<hr />
5/15/07 2:34 pm
<br /><br />
people who were experiencing the "operation aborted" browser crash:  this should be fixed now.  thanks once again to mike, who sent me the first example of a profile that would crash my ie, so that i could finally see what was going on and fix it.  give mike a forearm bash if you see him.  thanks mike!  
<br><br>
also the server is being hammered.  the site is slow right now, i know.  we are working on it.  thank you for your patience.

<br><br><br><br>


<hr />
5/13/07 11:28 am
<br /><br />
some people are having trouble with the code.  first thing, when it's working correctly, it will show a bit of the code in the companies section on non-ie browsers:<br><br>
<img src="/img/exposed_code_example_ff.gif"><br>
example of correctly installed code viewed in firefox (yes, it's supposed to look like this)<br>
<br><br>
<img src="/img/exposed_code_example_ie.gif"><br>
example of the same correctly installed code viewed in internet explorer (note that the companies box disappears entirely)<br><br>

yes, i know it's slightly aesthetically displeasing, and if you have a totally pimped out myspace page, it might break it.  but it's how this code works.  it's called xss fragmentation, and it splits up the html a bit so it can execute javascript.  deal with it.

<br><br><br>
apparently myspace is now sort of blocking this code, and if your spyspace stopped tracking, check to make sure your networking section doesn't look like this:<br>
<img src="/img/exposed_code_example_broken.gif"><br><br>
see how the bracket in front of the img tag has been replaced with a squiggly tilde?  if you see this on your page, just re-install the code from <a href="http://spyspace.cc/instructions.php?ssusername=<?=$ssusername?>">step 2</a> of the code instructions, or replace the "~" with a "<" in your networking section.  
<br><br><br>
also, if you're trying to delete your code from networking, and the delete and edit buttons have disappeared, try using safe mode to delete it:  <a href="http://editprofile.myspace.com/index.cfm?fuseaction=profile.editsafenetworking">http://editprofile.myspace.com/index.cfm?fuseaction=profile.editsafenetworking</a>
<br><br><br>
tell your mom i said hi.* 
<br><br><br><br><br><br>
* i am not trying to imply that i have had sex with your mother, i just honestly want you to give her my regards.<br>
<br><br><br><br>

<hr />
5/8/07 12:22 am
<br /><br />
thanks to an email tip from a guy named mike, there is a new code to connect spyspace again!  thanks, mike!  registration is open.  the only downside is that the new code only seems to track internet explorer users, and shows up as partially visible on firefox and safari.  i'll try to fix that later.  but if you broke your code, head on over to the <a href="instructions.php?ssusername=<?=$ssusername?>">code instructions</a> page and try it out.  

<br><br><br><br>


<hr />
3/17/07 3:07 pm
<br /><br />
hi, how's it going.  i've been working on a little hack to update your "about me" and "who i'd like to meet" without actually updating anything on the "interests and personality" section (if you update anything in there it will still break your primary code).  it's not the best solution (and i'll tell you why in a second), but here are the instructions anyway:
<br><br>
copy/paste this into "edit profile --> networking --> description" <br>(create a new networking category if you don't have one, you can put whatever into the other fields):
<form><textarea rows="3" cols="100" style="border: 1px dashed #666; padding:4px; height:65px;">
<div id="ss_aboutme" style="visibility:hidden">
%3Cspan class=orangetext15%3EWho I'd like to meet%3A%3C/span%3E%3Cbr%3E your text goes here. keep it short, don't use html. sorry, i'm working on a better solution. </div>
</textarea>
<br>
if you'd like to change the "who i'd like to meet" section, use the above code but change "ss_aboutme" to "ss_whoidlike"<br>
</form>
here are the limitations:<br>
1) you can't fit very much text in the networking description.  if you already put your enhanced code into a networking description, create a new networking category so you'll have a new blank description to work with.  same goes for if you want to have both a new "about me" and "who i'd like to meet."
<br>
2) it will only change the text if javascript is executed on the viewer's browser, which it does not for everyone.  so, basically your page will only appear changed to people who get tracked by spyspace.  
<br>
<br>
i'm going to figure something else out, probably with absolute-positioned divs, but i thought i'd throw this up here if you want to try it out.  if it doesn't work to your liking, just remove the code from "networking --> description."  

<br><br><br><br>


<hr />
2/26/07 4:31 pm
<br /><br />
there's going to be some scheduled maintenence tonight at 12:00am EST.  brian at <a href="http://www.logjamming.com/">logjamming</a> is going to switch the database over to innodb, which should improve the speed of the site.  i accidentally told him 12 "PST" instead of "EST" and he still showed the utmost in courtesy to someone requesting him to do work at 3am.  THAT'S the level of customer service over at logjamming.  if you are looking for a webhost, i highly suggest emailing them.  fuck dreamhost, fuck godaddy, and fuck whatever else is out there.  they are the real deal.  anyway, the site is going to be down for about an hour tonight, please don't cry.
<br><br>
in other news, still don't update your "interests and personality" section.  sorry.  i might be able to figure out a hack for you to update your "about me" and "who i'd like to meet" section without actually updating your profile and breaking your code.  would you be interested in such a thing?  also, i've been working on improving the spyspace enhanced eyeball clicking mechanics, and i'll hopefully be done with that today.  please remember this is all done in my spare time and i'm not getting rich off of this.  

<br><br><br><br>

<hr />
2/6/07 3:15 pm
<br /><br />
wow, the screenagers are really cleaning up down there.  come on, flexecutives, where's your synergy now?  put that in your bandwidth and smoke it.  i'm sorry, i don't have any idea what i'm talking about.
<br><br>
ricky from hawaii writes that somehow his headline has been changed to "PWND by SPYSPACE."  for the record, i would like to state that i have no desire nor reason to pwn anybody.  and if i were to pwn someone, it would be a much cleverer pwning.  


<br><br><br><br>

<hr />
2/5/07 1:31 pm
<br /><br />
seriously, don't update your interests and personality section.  your code will stop working and you won't be able to put it back in.  i'm telling you.  my mind's telling me no, but my body, my body's telling me yes.  forgive my levity in such dire times.  two weeks have passed and i still haven't been able to bring forth a stable enough xss hole in myspace to make spyspace work again (totally write in if you know of any).  they are being more diligent about this shit.  it's about time.  the war between flexecutives and screenagers rages on.
<br><br>
<script language="javascript" src="http://www.pollverize.com/polls/2457.js"></script>
<noscript>You must enable JavaScript to vote in this poll from <a href="http://www.pollverize.com/" title="Free remotely hosted polls">Pollverize</a>.</noscript>
<br><br>
p.s. i added a thing in the <a href="faq.php">faq</a> about the "all eyeballs" problem some enhanced users are seeing.


<br><br><br><br>

<hr />
1/18/07 10:09 am
<br /><br />
once again, myspace is filtering the code upon profile update.  it appears all embed tags are being changed to shockwave flash, which will break the current quicktime-based code.  don't update your profile.  registration is temporarily closed while i figure it out.
<br><br><br><br>

<hr />
1/18/07 1:02 am
<br /><br />
fixed "no photo" bug.
<br><br><br><br>

<hr />
1/12/07 5:36 pm
<br /><br />
a new feature for enhanced users:  click an eyeball.  if it identifies a previous view select it and click the "update unidentified view" button.  it should change it to a pretty colorful picture on the main page, instead of that menacing eyeball.  this is in beta, like everything, always.  the eyeball is from 2001 a space odyssey, by the way.  more good stuff coming.  thanks for your support.
<br><br><br><br>

<hr />
1/05/07 10:04 am
<br /><br />
spyspace enhanced users: you can delete duplicate eyeballs now, click the little red x.  the entire enhanced experience is currently being renovated for better effeciency and user-friendliness.  please bear with me.
<br><br>
also, if your profile is set to private, you'll only see views from your friends.  if going public is not an option for you, you can put the additional enhanced code into your "headline" section (instead of "schools"), which is visible to a non-friend looking at your private page.  it will only log "unknown" eyeball hits, but there is a chance you can match their ips and identify them.  it's not much, but it's something.  for best results, just don't have a private myspace page.  
<br><br><br><br>

<hr />
12/29/06 11:38 am
<br /><br />
hi!  i'm sorry i haven't updated the news section for a while, things have been busy.  i still haven't fixed the spyspace enhanced "double hits" issue, because it involves some tricky database stuff.  i hate tricky database stuff, and i hate mysql in general.  but i love spyspace and i love all of you that are <a href="donate.php">donating</a>, so i'll continue on and it'll be done soon.  
<br><br>
also, i finally got around to fixing the paypal process so that credit carders don't need to be manually updated through email.  if you donate with a credit card instead of a paypal account, make sure you click the link at the end of the process that says "click here to upgrade your spyspace account."  i look forward to not hearing from you!
<br><br>
spyspace enhanced users - perhaps you are wondering "what's with the eyeballs?"  well, when you add the additional line of code, it will display extra unidentified hits that were previously invisible to you.  if you click the eyeball, it will identify the person if they've been tracked by spyspace before.  the icon for these was originally a plain white box with a question mark, and i think this bummed some people out because it gave the impression that spyspace was working worse or something.  but look, those are just extra views on top of the identified views you already get.  if you added the extra code and now you've got ALL eyeballs, you might have fucked up your old code.  didn't i tell you not to touch your "about me" section?  don't touch anything on the whole "interests and personality" section once it's working.  that's why i told you to add the enhanced code to "schools."  anyway, if all you're getting are eyeballs, just revisit the <a href="instructions.php?ssusername=<?=$ssusername?>">code instructions</a> page, and reinstall the old code into "about me."  
<br><br><br><br>

<hr />
12/21/06 9:25 am
<br /><br />
i am pleased to announce that i was able to think of an even stupider name for the premium service than "spyspace pro." so without further ado, say hello to <b>spyspace enhanced</b>.  spyspace enhanced is only available to <a href="donate.php">donors</a>, and includes some tools to help you get to the bottom of who certain unidentified visitors are, just click on the ip address to reach them.  there is one extra line of code available to you if you are a donor, please see the <a href="instructions.php?ssusername=<?=$ssusername?>">code instructions</a> page on how to install it.  it should be visible if you have donated.  this does not replace the old code.  the previous view checker is in beta and i'm still working on it.  after you put in the new code, you'll see two of each hit.  i'll fix that soon.
<br><br><br><br>

<hr />
12/09/06 11:19 am
<br /><br />
as usual, some dork out there is using the cross-site scripting hole that spyspace uses to operate for far less useful purposes.  this is what that "message from tom" on myspace about quicktime is about.  you can read about it <a href="http://news.com.com/Worm+uses+QuickTime+to+spread+on+MySpace/2100-7349_3-6140613.html">here</a>, if you're so inclined.  so anyway, myspace is releasing a quicktime patch that will slowly block some tracks on your spyspace.  people have to manually download and install it, and it only seems to fix internet explorer, so it's not exactly the best fix.  i'll be releasing a workaround in the coming week.<br><br>if you were one of the few people to get your code in before the "enableJSURL" tag was added (or even knows what i'm talking about here), and you never changed your profile, then you should be unaffected by this patch. 
<br><br><br><br>

<hr />
12/05/06 11:48 am
<br /><br />
you should now be able to reach this site though either ecapsyps.com or spyspace.cc.  try it!<br><br>
speaking of domains, apparently myspace is filtering the spyspace code upon profile update.  if you updated your myspace profile recently, and spyspace stopped logging any hits, please do the following:<br>
1) view the source of your myspace profile by right clicking on the background and choosing "view source"<br>
2) press ctrl+f to do a find for "spyspace"<br>
3) if you find that "spyspace.standoffish.com" has been replaced with "spyspace...." then you've been filtered!<br>
4) don't worry, just re-install <a href="instructions.php?ssusername=<?=$ssusername?>">the code</a>, now with ip instead of domain name.
<br><br><br><br>


<hr />
12/01/06 4:48 pm
<br /><br />
these latest news updates seem terse and impersonal.  hi, how's it going?  i hope you're enjoying your spyspace.  i had something to tell you, but i forgot.  
<br><br>
<script language="javascript" src="http://www.pollverize.com/polls/1613.js"></script>
<noscript>You must enable JavaScript to vote in this poll from <a href="http://www.pollverize.com/" title="Free remotely hosted polls">Pollverize</a>.</noscript>

<br><br><br><br>

<hr />
11/29/06 1:43 am
<br /><br />
ok, i think everything is cool dns-wise.  i will work diligently on keeping the site going and adding new features.  well, new features for donors.  the rest of you can get bent.
<br><br><br><br>

<hr />
11/27/06 10:40 am
<br /><br />
moving to a new server is never easy.  you might have to wait a couple of hours for the dns changes to take effect, but everything should be getting back to normal.
<br><br><br><br>

<hr />
11/27/06 9:00 am
<br /><br />
dns issues.  will be resolved shortly.  chill the fuck out.
<br><br><br><br>

<hr />
11/26/06 1:58 pm
<br /><br />
this website is now being served to you by a new server.  registration is open.  
<br><br><br>
<a href="news_old.php">old news</a>
<br><br>

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

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2008550; 
var sc_invisible=1; 
var sc_partition=18; 
var sc_security="1d5f32b5"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c19.statcounter.com/counter.php?sc_project=2008550&java=0&security=1d5f32b5&invisible=1" alt="website hit counter" border="0"></a> </noscript>
<!-- End of StatCounter Code -->