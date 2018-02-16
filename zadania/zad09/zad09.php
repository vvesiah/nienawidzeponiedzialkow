<?php
$url = "http://4609531:SzZYJ%Aj@datatransfer.cj.com/datatransfer/files/4609531/outgoing/productcatalog/205969/Vans_UK-Product_Feed.txt.gz";
preg_match("@[^/]+\.gz@Usi",$url,$match);

$temp_filename = $match[0];

$data = file_get_contents($url); 

$fh = fopen($temp_filename,"w");
fwrite($fh,$data);
fclose($fh);

if(!is_dir("meh")){
	mkdir("meh");
}

$output_filename = str_replace(".gz","",$temp_filename);
$gz_file = gzopen($temp_filename,"rb");
$output = fopen("meh/".$output_filename,"w");

while(!gzeof($gz_file)){
	fwrite($output,gzread($gz_file, 4096));
}

fclose($output);
//chmod($temp_filename,0777);
unlink($temp_filename);

?>
