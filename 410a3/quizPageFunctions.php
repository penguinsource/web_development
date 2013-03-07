<?php


$randQs[1] = -1;
$randQs[2] = -1;
$randQs[3] = -1;



function parseJSONFile() {
	//$str_data = file_get_contents("data.json");
	//$data = json_decode($str_data, true);
	//var_dump($str_data);
	//echo "Boss hobbies: ".$data["correct"]["Hobbies"][0]."\n";
	//echo "Boss hobbies: " . $data["correct"] . "yes\n";
	$n = 1;
	$i = 1;
	$arr = array();
	while ( $i < 4 ) {
		$x = mt_rand(1,15);
		if ( !in_array($x,$arr) ) { $arr[] = $x; $GLOBALS["randQs"][$i] = $x;$i++; }
	}
	print_r($GLOBALS["randQs"]);
	
	$file_handle = fopen("data.json", "r");
	while (!feof($file_handle)) {
		$line = fgets($file_handle);
		$data = json_decode($line, true);
		//echo "n is " . $n . " and: " . $data['correct'] . "<br><br>";
		if ($GLOBALS["randQs"][1] == $n){$GLOBALS["randQs"][1] = $line;}
		if ($GLOBALS["randQs"][2] == $n){$GLOBALS["randQs"][2] = $line;}
		if ($GLOBALS["randQs"][3] == $n){$GLOBALS["randQs"][3] = $line;}
		$n++;
	}
	/*echo "one is " . $randQs[0] . "<br><br>";
	echo "two is " . $randQs[1] . "<br><br>";
	echo "three is " . $randQs[2] . "<br><br>";*/
}

function printQuestion($qsNo){
	$decodedQ = json_decode($GLOBALS["randQs"][$qsNo], 1);
	// if the question has a source..
	if (isset($decodedQ["source"])){
		echo "<p>" . $decodedQ["source"] . "</p><br>";
	}
	// if the question has media..
	if (isset($decodedQ["media"][0])){
		echo "<img src='" . $decodedQ["media"][0] . "' height='150', width='150' ><br>";
	}
	/*if ($decodedQ["media"][0]){
		echo 'MEDIA FOR' . $qsNo . ", is: " . $decodedQ["media"][0];
	}*/
	echo "q: " . $decodedQ["stem"] . "<br>";
}

?>
