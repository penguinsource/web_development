<?php




if ($_SERVER['REQUEST_METHOD'] == "GET"){
	//echo "GET request";
	if (isset($_GET["id"])){
		//echo "DATA RECEEEIVED => id=" . $_GET["id"];
		//echo "; returning description for id=" . $_GET["id"];
		//getItem($_GET["id"]);
		//getAllItems();
		getItem($_GET["id"]);
		//getAllItems();
	} else {	// return JSON catalogue
		getAllItems();
	}
	
} else if ($_SERVER['REQUEST_METHOD'] == "POST"){	// post request
	if (isset($_POST["data"])){						// check if data exists
		$object = json_decode($_POST["data"]);		// decode json
		addObject($object->{'name'}, $object->{'desc'}, $object->{'price'});
	}
}

function getCount(){
	$n = 0;
	$fp = fopen('data.txt', 'r');
	while ($line = fgets($fp)){
		//echo " line $n: " . $line . "\n";
		$n++;
	}
	return $n;
}

function addObject($name, $desc, $price){
	$count = getCount();
	$fpAdd = fopen('data.txt', 'a');
	fwrite($fpAdd, $count . " " . $name . " " . $desc . " " . $price);
	fwrite($fpAdd, PHP_EOL);	// this is a line break
	fclose($fpAdd);
}

function getAllItems(){
	$fp = fopen('data.txt', 'r');
	$list = array();
	while ($line = fgets($fp)){
		$parts = explode(' ', $line);
		$temp = array('id' => $parts[0], 'name' => $parts[1]);
		array_push($list, $temp);
	}
	//print_r(json_encode($list));
	echo (json_encode($list));
}

function getItem($id){
	$existsFlag = false;
	$list = array();
	while ($line = fgets($fp)){
		$parts = explode(' ', $line);
		if ($parts[0] == $id){
			$existsFlag = true;
			$temp = array('desc' => $parts[2], "price" => $parts[3]);
			array_push($list, $temp);
		}
		$temp = array('id' => $parts[0], 'name' => $parts[1]);
		array_push($list, $temp);
	}
	//if ($existsFlag == true){
		echo (json_encode($list));
	//} else{
	//	echo null;
	//}
}

/*
// COUNT IS n ..
fclose($fp);
$dude="wtfsss";
$fp2 = fopen('data.txt', 'a');
fwrite($fp2, PHP_EOL);	// this is a line break
fwrite($fp2, $dude);
fclose($fp2);
*/

/*$filee = "3 a e re twet w";
$fileee = "bbbb";
fwrite($fp, $filee);
fwrite($fp, PHP_EOL);	// this is a line break
fwrite($fp, $fileee);*/
//fwrite($fp, '4 id' + ' name' + ' price' + ' desc');


?>