<?php

$timer_start = microtime(true);

$ch = curl_init();
$url = "http://php.net/archive/1998.php";

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$contents = curl_exec($ch);
curl_close($ch);


$timer_end = microtime(true);
$total_time = $timer_end - $timer_start;
echo "<center>Total time for curl based method "."$total_time"." seconds</center>";
?>
