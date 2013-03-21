<?php

  // product class
  class product {
	public $ID, $Name, $specs, $price, $quantity, $image;
  }

	$url = $_POST['url'];

    $urlLength = strlen($url);

	if (! preg_match("/.xml$/", $url)){
	 die("invalid xml file ( no .xml )");
	}
	
	// dom parse
	/*DOMParser myParser = new DOMParser();
	myParser.parse ( $url );
	Document document = myParser.getDocument();
	echo "doc:".document;*/
	
	// dom.. 
	$doc = new DOMDocument();
	$doc->load( $url );
	showDOMNode($doc);
	
	$titleE = $doc->getElementsByTagName( "title" );
	$title = $titleE->item(0)->nodeValue;
	
	
	$products = $doc->getElementsByTagName( "product" );

	echo "<table border=1>";

	if (!@fopen($url, 'r')){
	 die("<br>Invalid XML !");
	}

	$n = 0;
	$productArray = array();
	foreach($products as $product){
		$idE = $product->getElementsByTagName("ID");
		$id = $idE->item(0)->nodeValue;
		$NameE = $product->getElementsByTagName("Name");
		$name = $NameE->item(0)->nodeValue;
		$specsE = $product->getElementsByTagName("specs");
		$specs = $specsE->item(0)->nodeValue;
		$priceE = $product->getElementsByTagName("price");
		$price = $priceE->item(0)->nodeValue;
		$quantityE = $product->getElementsByTagName("quantity");
		$quantity = $quantityE->item(0)->nodeValue;
		$imageE = $product->getElementsByTagName("image");
		$image = $imageE->item(0)->nodeValue;

		// creating an object
		$prod = new product;
		// saving to an object
		$prod->id = $id;
		$prod->Name = $name;
		$prod->specs = $specs;
		$prod->price = $price;
		$prod->quantity = $quantity;
		$prod->image = $image;
		// add the object to the array
		$productArray[$n] = $prod;
		$n++;	// increase count
	}
  
	// sort the products..
	usort($productArray, "cmp");

	// write the html table..
	writeHTMLTable($n, $productArray);

	
	function getSum($arrayObjs){
		$sum = 0;
		foreach ($arrayObjs as $obj){
			$sum += $obj->price * $obj->quantity;
		}
		return $sum;
	}
  
	function cmp($a, $b){
		return strcmp($a->Name, $b->Name);
	}

	function writeHTMLTable($n, $productArray){
		echo "<tr><td>Product</td><td>Name</td>".
		"<td>Description</td><td>Price</td><td>Quantity</td><td>Image</td></tr>";

		  for ($i = 0; $i < $n; $i++){
			echo "<td>" . $productArray[$i]->id . "</td>";
			echo "<td>" . $productArray[$i]->Name . "</td>";
			echo "<td>" . $productArray[$i]->specs . "</td>";
			echo "<td> $" . $productArray[$i]->price . "</td>";
			echo "<td>" . $productArray[$i]->quantity . "</td>";
			echo "<td><img src='" . $productArray[$i]->image . "'></td>";
			echo "</tr>";
		  }
		  
		  echo "</table>";
		  echo "sum=" . getSum($productArray);
	}
	
	function showDOMNode(DOMNode $domNode) {
	echo "printing:<br>";
		foreach ($domNode->childNodes as $node){
			print $node->nodeName.':'.$node->nodeValue."<br>";
			if($node->hasChildNodes()) {
				showDOMNode($node);
			}
		}    
	}

?>
