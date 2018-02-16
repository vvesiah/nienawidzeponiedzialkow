<?php
$feedUrl = "https://www.itrepairs.ie/?pricefile=prisjakt";
$fd = file_get_contents($feedUrl, "r");
$replaced_fd = str_replace('"','',$fd);
print_r($replaced_fd);
file_put_contents('feed.txt', $replaced_fd);
?>
