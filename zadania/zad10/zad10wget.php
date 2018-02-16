<?php

$timer_start = microtime(true);

$url = "http://php.net/archive/1998.php";

exec("wget $url");

$timer_end = microtime(true);
$total_time = $timer_end - $timer_start;
echo "<center>Total time for wget based method "."$total_time"." seconds</center>";
?>
