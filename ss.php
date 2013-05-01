<?php
$ssu = $_GET['u'];
$file = "ss_internal.mov";
header("Content-Type: video/quicktime");
//header('Content-Disposition: attachment; filename="' . $file . '"');
//header("Content-Length: " . filesize($file));

$mov_str = file_get_contents($file);
echo (str_replace('12345678901234567890',$ssu,$mov_str));
?>