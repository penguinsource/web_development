<?php

$url = $_POST['url'];
echo "url: ".$url;



  $urlLength = strlen($url);

  if (! preg_match("/.xml$/", $url)){
     die("invalid xml file ( no .xml )");
  }
  $doc = new DOMDocument();
  $doc->load( $url );

  //$books = $doc->getElementsByTagName( "catalog" );
  //$books2 = $books->item(0)->nodeValue;

  $titleE = $doc->getElementsByTagName( "title" );
  $title = $titleE->item(0)->nodeValue;

  //foreach($doc as $elem)
  $hotels = $doc->getElementsByTagName( "hotel" );
  //$hotel = $hotelA->item(0)->nodeValue;
  //echo "h1: $hotel<br>";
  //$hotel2 = $hotelA->item(1)->nodeValue;
  //echo "h2: $hotel2 <br>";
  echo "<table border=1>";

  if (!@fopen($url, 'r')){
     die("<br>Invalid XML !");
  }



  echo "<tr><td>Hotel Name</td><td>Price per night</td>".
  "<td>Swimming Pool</td><td>Restaurants</td><td>Photo</td></tr>";
  foreach($hotels as $hotel){
     echo "<tr>";
     $name = $hotel->getAttribute("name");

     $priceE = $hotel->getElementsByTagName("price");
     $price = $priceE->item(0)->nodeValue;

     $poolNoE = $hotel->getElementsByTagName("pool");
     $poolNo = $poolNoE->item(0)->nodeValue;

     echo "<td>" . $name . "</td>";
     echo "<td>" . $price . "</td>";

     if ($poolNo > 0){
        echo "<td> Yes </td>";
     } else{
        echo "<td> No </td>";
     }

     $restaurantE = $hotel->getElementsByTagName("restaurant");
     $restaurant = $restaurantE->item(0)->nodeValue;
     echo "<td>" . $restaurant . "</td>";

     $imageE = $hotel->getElementsByTagName("image");
     $image = $imageE->item(0)->nodeValue;
     echo "<td><img src='" . $image . "'></td>";

     echo "</tr>";
     //echo "hotel name: $name <br>";
  }
  echo "</table>";

/*
  foreach( $books as $book ) {
                $authors = $book->getElementsByTagName( "hotel" );
                $author = $authors->item(0)->nodeValue;
                $second = $authors->item(1)->nodeValue;

                $publishers = $book->getElementsByTagName( "publisher" );
                $publisher = $publishers->item(0)->nodeValue;

                $titles = $book->getElementsByTagName( "title" );
                $title = $titles->item(0)->nodeValue;

                echo "$author , second: $second <br>hey";
  }*/

?>
