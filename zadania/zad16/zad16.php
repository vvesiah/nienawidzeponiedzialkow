<?php
header("content-type:text/plain");

$url = "https://performancevelo.com/25-velos-gravel";

$fh = file_get_contents($url);

preg_match_all('@class="product_img_link"[^"]+"([^"]+)".*?front-image"[^"]+"([^"]+)".*?title="([^"]+)".*?data-id-product="([^"]+)".*? itemprop="price"[^"]+"([^"]+)"@si',$fh,$data);

$prodUrl = $data[1];
$prodImg = $data[2];
$prodName = $data[3];
$prodID = $data[4];
$prodPrice = $data[5];

$products = array();

for($i = 0; $i < count($data[0]); $i++){

	$currentProd = file_get_contents($prodUrl[$i]);
	preg_match('@>Tailles.*?</select@si',$currentProd,$slice);
	preg_match_all('@<option\svalue="([^"]+)".*?title="([^"]+)"@si',$slice[0],$options);

	$optionSizeID = $options[1];
	$optionSize = $options[2];

	for($j = 0; $j < count($options[0]); $j++){
	
		$optionUrl = $prodUrl[$i]."#/".$optionSizeID[$j]."-tailles_cadre-".$optionSize[$j];
		$optionName = $prodName[$i]." - taille de cadre ".$optionSize[$j];
		$optionID = $prodID[$i]."-".$optionSizeID[$j]; //we can use also $optionSize instead of $optionSizeID
	
		$product = array
			(
			'product_name' =>  $optionName,
			'pris_unique_code' => $optionID,
			'url' => $optionUrl,
			'image' => $prodImg[$i],
			'price' => $prodPrice[$i]
			);
		array_push($products,$product);
	}
}

print_r($products);

?> 


