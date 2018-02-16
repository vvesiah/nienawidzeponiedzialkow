<?php
header("content-type:text/plain");
$url = "http://www.triaxe-store.com/catalog/category/moreproducts";

$catNr = 7;			//category number
$prodLimit = 8;		//result limit

$postfields = "category=".$catNr."&number=".$prodLimit."&critere=created_at";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POSTFIELDS,$postfields);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
curl_close($ch);

preg_match_all('@data-name="([^"]+)"[^"]+"([^"]+)".*?"\ssrc="([^"]+)".*?marque">([^<]+)?<[^"]+"([^"]+)".*?href[^>]+>([^<]+)<.*?normal">([^\s]+)\s@si',$result,$data);

$prod_name = $data[1];
$manufacturer = $data[4];
$unique_code = $data[2];
$category = $data[6];
$product_url = $data[5];
$image = $data[3];
$price = $data[7];

$products = array();

for($i = 0; $i < count($data[0]); $i++){
		
	$product = array
	(
	'product_name' => $manufacturer[$i]." ".$prod_name[$i],
	'pris_unique_code' => $unique_code[$i],
	'category_name' => $category[$i],
	'url' => "http://www.triaxe-store.com".$product_url[$i],
	'image' => $image[$i],
	'price' => $price[$i],
	);
	array_push($products,$product);
}

print_r($products);
?>

