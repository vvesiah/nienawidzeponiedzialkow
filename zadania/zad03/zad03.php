<?php
header("content-type:text/plain");
$url = "https://www.pixmania.it/api/pcm/custom_categories?ids=u_1&ids=u_2&ids=u_3&ids=u_4&ids=u_5&ids=u_6&ids=u_7&ids=u_8";
$json = file_get_contents($url);
$array = json_decode($json, true); 

$categoryList = array(); // just in case

for($i = 0; $i < count($array['categories']); $i++){
	$parent = ($array['categories'][$i]['parents']['0']['name']['en-GB']);
	
	for($j = 0; $j < count($array['categories'][$i]['children']); $j++){
		$child = ($array['categories'][$i]['children'][$j]['name']['en-GB']);
		
		$line = "$parent"." / "."$child";
		echo $line."\n";
		array_push($categoryList,$line);
	}
}
//print_r($categoryList); // just in case

//then just lauch the terminal and type "php zad03.php" while in an adequate folder.
?>
