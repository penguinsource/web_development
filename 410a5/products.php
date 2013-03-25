<?php

$n = 0;

echo " ; request method is : " . $_SERVER['REQUEST_METHOD'] . " ; ";

if (isset($_GET["id"])){
	//echo "DATA RECEEEIVED => id=" . $_GET["id"];
	echo "; returning description for id=" . $_GET["id"] . "; n=".$n;
} else if (isset($_POST["name"])){
	echo "; adding item with name=" . $_POST["name"]. "; n=".$n;
} else {
	echo "; wat" . "; n=".$n;
}
$fp = fopen('data.txt', 'r');
while ($line = fgets($fp)){
	echo " line $n: " . $line . "\n";
	$n++;
}

// COUNT IS n ..
fclose($fp);
$dude="wtfsss";
$fp2 = fopen('data.txt', 'a');
fwrite($fp2, PHP_EOL);	// this is a line break
fwrite($fp2, $dude);
fclose($fp2);

/*$filee = "3 a e re twet w";
$fileee = "bbbb";
fwrite($fp, $filee);
fwrite($fp, PHP_EOL);	// this is a line break
fwrite($fp, $fileee);*/
//fwrite($fp, '4 id' + ' name' + ' price' + ' desc');


?>