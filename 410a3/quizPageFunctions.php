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
	echo "<div class='questionPos'>";
	// if the question has a source..
	if (isset($decodedQ["source"])){
		echo "<p>" . $decodedQ["source"] . "</p><br>";
	}
	
	// if the question has media..
	if (isset($decodedQ["media"][0])){
		$link = $decodedQ["media"][0];
		$lenFile = strlen($link);
		//echo 'length is ' . strlen($link) . ' . last chars: ' . $link[$lenFile-3];
		$size = getimagesize($decodedQ["media"][0]);
		// if it's an avi (movie) file
		if ($link[$lenFile-3] == 'a'){
			echo "<OBJECT id='VIDEO'>";
			echo "<PARAM NAME='URL' VALUE=$link>";
			echo "<PARAM NAME='AutoStart' VALUE='True'>";
			echo '</OBJECT>';
		} else {	// else it's an image (png, jpg, ..)	
			echo "<img id='imgfile' src='" . $decodedQ["media"][0] . "' ";
			if ($size[0] > 250){
				echo "width='250' ";
			}
			if ($size[1] > 250){
				echo ",height='250'";
			}
			echo ">";
		}
	}
	echo "<br>";
	
	echo $decodedQ["stem"] . "<br>";
	
	
	echo "</div>";
	echo "<div class='answerPos'>";
		printOption($decodedQ["options"][0], 1, $qsNo);
		printOption($decodedQ["options"][1], 2, $qsNo);
		printOption($decodedQ["options"][2], 3, $qsNo);
		printOption($decodedQ["options"][3], 4, $qsNo);
		/*echo "1: " . $decodedQ["options"][0] . "<br>";
		echo "2: " . $decodedQ["options"][1] . "<br>";
		echo "3: " . $decodedQ["options"][2] . "<br>";
		echo "4: " . $decodedQ["options"][3] . "<br>";*/
	echo "</div>";
	
}

function printOption($optionStr, $answerNo, $qsNo){
	if (($optionStr[0] == 'h') && ($optionStr[1] == 't') && 
	($optionStr[2] == 't') && ($optionStr[3] == 'p')){
		echo "<input type='radio' id="four1" name='ans' onclick="answerQuestion('four');"> <label for="four">0.2 N</label>";
		echo "<img src=$optionStr height='85px' width='85px'><br>";
	}else{
		echo $optionStr . "<br>";
	}
}

?>
