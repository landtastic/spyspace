<?php
/*
$fp = fsockopen("www.maxmind.com/app/locate_ip", 80, $errno, $errstr, 30);
if (!$fp) {
   echo "$errstr ($errno)<br />\n";
} else {
   $out = "GET / HTTP/1.1\r\n";
   $out .= "Host: www.example.com\r\n";
   $out .= "Connection: Close\r\n\r\n";

   fwrite($fp, $out);
   while (!feof($fp)) {
       echo fgets($fp, 128);
   }
   fclose($fp);
}
*/
$theip = $_GET['ip'];
$theip = htmlspecialchars($theip);

function post($host,$query,$others=''){
   $path=explode('/',$host);
   $host=$path[0];
   unset($path[0]);
   $path='/'.(implode('/',$path));
   $post="POST $path HTTP/1.1\r\nHost: $host\r\nContent-type: application/x-www-form-urlencoded\r\n${others}User-Agent: Mozilla 4.0\r\nContent-length: ".strlen($query)."\r\nConnection: close\r\n\r\n$query";
   $h=fsockopen($host,80);
   fwrite($h,$post);
   for($a=0,$r='';!$a;){
       $b=fread($h,8192);
       $r.=$b;
       $a=(($b=='')?1:0);
   }
   fclose($h);
   return $r;
}

//echo post("www.maxmind.com/app/locate_ip","ips=$theip","");
echo post("www.geobytes.com/IpLocator.htmIpLocator.htm?GetLocation","ipaddress=$theip","");

?> 