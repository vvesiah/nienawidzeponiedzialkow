<?php
$url = 'ecca90fc5eab1d159821c2c62cf7933e.csv'; // in case the online feed was modified...

header("content-type: text/plain");

$fh = str_replace('"','',file_get_contents($url)); //got rid of quotation marks

preg_match_all('@(\d{4}),([^,]+),.*,(http:[^,]+),(http:[^,]+jpg)?,(\d+),(.*)\n@Usi',$fh,$data);

$prod_name = $data[2];
$unique_code = $data[1];
$category = $data[6];
$product_url = $data[3];
$image = $data[4];
$price = $data[5];

$products = array();

for($i = 0; $i < count($data[0]); $i++){
		
	$product = array
	(
	'product_name' => $prod_name[$i],
	'pris_unique_code' => $unique_code[$i],
	'category_name' => $category[$i],
	'url' => $product_url[$i],
	'image' => $image[$i],
	'price' => $price[$i],
	);
	array_push($products,$product);
}

print_r($products);

?>
