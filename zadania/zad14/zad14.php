<?php
header("content-type:text/plain");
$url = "http://techfx.co.nz/wp-json/product_feed";
$json = file_get_contents($url);
$fh = json_decode($json,true);
$products = array();
//print_r($fh[0]);

for($i = 0; $i < count($fh); $i++){
	$product = array
		(
		'product_name' =>  $fh[$i]['product_name'],
		'pris_unique_code' => $fh[$i]['id'],
		'category_name' => $fh[$i]['category'],
		'url' => $fh[$i]['product_url'],
		'image' => $fh[$i]['image_url'],
		'price' => $fh[$i]['price'],
		'shipping' => '',
		'ean' => '',
		'stock_status' => $fh[$i]['available_stock'],
		'junk_typ' => '',
		'extra' => '',
		'manufacturersku' => $fh[$i]['sku']
		);
	array_push($products,$product);
}
print_r($products);
?>
