<?php
//*******move this code to track.php
if (!isset($uid)) $uid = 170830;

$curl_handle = curl_init();
curl_setopt ($curl_handle, CURLOPT_URL, 'http://profile.myspace.com/index.cfm?fuseaction=user.viewprofile&friendID='. $uid);



curl_setopt($curl_handle, CURLOPT_COOKIE, 'TIMEZONE=0; ME=land%40l4nd%2Ecom; DERDB=ZG9tYWluPWw0bmQmdGxkPWNvbSZzbW9rZXI9LTEmc2V4cHJlZj0xJnNlcmlvdXNyZWxhdGlvbnNoaXBzPTAmcmVsaWdpb25pZD0xNCZyZWdpb249JnBvc3RhbGNvZGU9OTAwMTkmbWFyaXRhbHN0YXR1cz1TJmluY29tZWlkPTAmaGVpZ2h0PTE4NSZnZW5kZXI9TSZmcmllbmRzPTEmZXRobmljaWQ9LTEmYWdlPTI2JmJvZHl0eXBlaWQ9NSZjaGlsZHJlbmlkPTEmY291bnRyeT1VUyZkYXRpbmc9MCZkcmlua2VyPTEmZWR1Y2F0aW9uaWQ9Mg%3D%3D; REVSCI=1; FRNDID=27758356; MYSPACE=myspace; AUTOSONGPLAY=0; IID=CC841635%2DEF20%2D4D88%2DA7A4%2DE4657024AAFD; MSCOUNTRY=US; MYUSERINFO=MIHfBgkrBgEEAYI3WAOggdEwgc4GCisGAQQBgjdYAwGggb8wgbwCAwIAAQICZgMCAgDABAhO9sIH9wSkSgQQvDttd4qlxqeACSZDVQr0AASBkOImS2UPVyYbjZQEYCSXF7B95dzCfAV6gfTLfKMAPM6qmeuP9S4kwIWzBUmgbb82x9RPS6rLnplJj8supDvN5d2crJcZLIIiVMfou1HeMBupk658JZHFbSmtBpeZXS49KP7TtIp%2F7w5o84p5bn2b%2Fmd62F0TYbEKthJ2U2eehgrU5Pj94OI5vMUJ3W7EhI76%2Bg%3D%3D');




// set the return to buffer
curl_setopt ($curl_handle, CURLOPT_RETURNTRANSFER, 1);
// set the wait timeout
curl_setopt ($curl_handle, CURLOPT_CONNECTTIMEOUT, 1);
// init the buffer and make the call
$profile_page = "";
$profile_page = curl_exec($curl_handle);

$imgchunk_start = strpos($profile_page,'DefaultImage');
// grab a 500 character chunk, starting at DefaultImage
$imgchunk = substr($profile_page, $imgchunk_start,500);

//split html string on "
$img_chunk_array = explode('"',$imgchunk);
//replace _m with _s for smaller thumbnail
$img = str_replace("_m","_s",$img_chunk_array[4]);

// check for errors
$curl_errors = curl_errno($curl_handle);
// finished, close curl
curl_close($curl_handle);
// see if there was an error or no empty buffer
if ( $curl_errors || !$profile_page ) {
    // make sure we return empty to show cache if errors
    $profile_page = "";
}

echo $profile_page;
//echo $imgchunk;
//print_r($img_chunk_array);
//header("Location: ".$img);
?>