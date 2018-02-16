<?php
header("content-type:text/plain");
class dude
{	
	public $name;
	protected $surname;
	private $phone;
	
	function __construct(){
		$this->name = "Anon";
		$this->surname = "Ymous";
		$this->phone = 123456789;
	}
	function show(){
		try{
		echo $this->name."\n";
		} catch (Error $e) {
			echo "public property\n";
		}
		
		try{
		echo $this->surname."\n";
		} catch(Error $e) {
			echo "protected property\n";
		}
		
		try{ 
		echo $this->phone."\n";
		} catch(Error $e) {
			echo "private property\n";
		}
		echo "\n";
	}
}

class mate extends dude
{
	function show(){
		try{
		echo $this->name."\n";
		} catch (Error $e) {
			echo "public property\n";
		}
		
		try{
		echo $this->surname."\n";
		} catch(Error $e) {
			echo "protected property\n";
		}
		
		try{ 
		echo $this->phone."\n";
		} catch(Error $e) {
			echo "private property\n";
		}
		echo "\n";
	}
}

$dude = new dude();
$mate = new mate();

$dude->show();
$mate->show();

echo $dude->name;
echo $dude->surname;
echo $dude->phone;
?>
