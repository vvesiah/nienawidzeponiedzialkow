<?php
$fd = "https://static.dlgamer.com/feeds/general_feed_it.json";
$json = file_get_contents($fd);
$arr = json_decode($json, true);
//print_r($array);

function array2xml($array,&$xml_data){
	foreach($array as $key => $value){
		if(is_numeric($key)){
			$key = "product_".$key;
		}
		if(is_array($value)){
			$subnode = $xml_data->addChild($key);
			array2xml($value,$subnode);
		}
		else {
			$xml_data->addChild("$key",htmlspecialchars("$value"));
		}
	}
}
$xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

array2xml($arr,$xml_data);
$freshXML = $xml_data->asXML('convertedjson.xml');

echo "done, yay";
?>
