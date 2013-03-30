<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php include 'funcsPHP.php'; ?>

<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<title>
	410-A5
</title>
<link rel="stylesheet" type="text/css" href="design.css">

<script type="text/javascript">
var itemIDselected = null;
	function sendRequest(type, input, idSelected){
		//alert("type of req:" + type + ", value:" + document.getElementById("name").value);
		var xmlhttp;
		if (window.XMLHttpRequest){	// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function(){
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				//document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
				
				//alert("response: "+xmlhttp.responseText);
				
				object = xmlhttp.responseText;
				obj = JSON.parse(object);
				alert(obj[0].desc);
				if (obj[0].desc == null || obj[0].desc == ''){	// check to see which call is being received
					contentDiv = document.getElementById("content");
					for (i = 0; i < obj.length;i++){
						contentDiv.innerHTML += "<div><button onClick=\"sendRequest('GET', 'description'," + obj[i].id + ")\" id='btnID"+ obj[i].id +
												"'>Get Desc</button> "+ obj[i].name + "</br><div id='item"+obj[i].id+"'></div></div>";
					}
				} else {
					//itemDiv = document.getElementById("content");
					//itemDiv.innerHTML="blah blah";
					
				}
				//obj = JSON.stringify(object)
				//var haha = eval("("+object+")");
				
				//alert("length:"+obj.length);

			}
		}
		
		var url = "products";
		if (type == "GET"){
			var params = "";
			if (input == "description"){		// for call: 	  GET /api/items/1
				//params += "id="+"1";	// description for item with id .. document.getElement...
				params += "/"+idSelected;
				itemIDselected = idSelected;
			} 									// else for call: GET /api/items
			//alert("GET call url: " + url+"/"+params);
			xmlhttp.open("GET",url+params,true);
			xmlhttp.send();
		} else if (type == "POST"){				// for call: 	  POST /api/items
			var nameVal = "'" + document.getElementById("name").value + "'";
			var priceVal = "'" + document.getElementById("price").value + "'";
			var descVal = "'" + document.getElementById("description").value + "'";
			
			if ((nameVal == null) || nameVal == ""){
				alert("Did ya forget the name of your item ?");
				document.getElementById("name").focus();
				return;
			} else if ((priceVal == null) || priceVal == ""){
				alert("Did ya forget the price of your item ?");
				document.getElementById("price").focus();
				return;
			} else if ((descVal == null) || descVal == ""){
				alert("Did ya forget the description of your item ?");
				document.getElementById("description").focus();
				return;
			}
			var jsonObj= {
			"name":nameVal,
			"price":priceVal, 
			"desc":descVal};
			var blah = JSON.stringify(jsonObj);
			//var params = "name="+nameVal+"&price="+priceVal+"&desc="+descVal; 
			var params = "data="+encodeURIComponent(blah);
			xmlhttp.open("POST", url, true);
			//alert("POST call url: " + url + ", params: " + params);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
			xmlhttp.setRequestHeader("Content-length", params.length); 
			xmlhttp.setRequestHeader("Connection", "close"); 
			
			xmlhttp.send(params);
		}
	}
</script>

</head>

<body>

<div id="centerPageContainer">
	<h2>Fruit Store </h2>
	<div id="bodyContainer">
		<p class="startPar">Welcome to my fruit store! What can I help you with? </p>
		<table border="0">
			<tr>
			<td>Name</td>
			<td><input name='name' id='name' type="text"></td>
			</tr>
			<tr>
			<td>Price</td>
			<td><input name='price' id='price' type="text"></td>
			</tr>
			<tr>
			<td>Description</td>
			<td><input name='description' id='description' type="text"></td>
			</tr>
		</table>
		<button onClick="sendRequest('POST')"> Add Item </button>
		<hr>
		<button onClick="sendRequest('GET', 'catalogue')"> Get Catalogue </button>
		<button onClick="sendRequest('GET', 'description')"> Get Description </button>
		
		<div name="content" id="content">
			
		</div>
		<!-- <form action="products.php" method="get">
		<button>Get Catalogue</button>
		</form> -->
		<?php
		
		//$req =& new HTTP_Request("http://www.php.net");
		//$response = http_get("products.php", array("timeout"=>1), $info);
		//$body = file_get_contents("products.php"); 
		//echo $body;
		//echo file_get_contents('products.php');
		
		/*
		$r = new HttpRequest('http://localhost/410a5/products.php', HttpRequest::METH_GET);
		$r->setOptions(array('lastmodified' => filemtime('local.rss')));
		$r->addQueryData(array('category' => 3));
		try {
			$r->send();
			if ($r->getResponseCode() == 200) {
				file_put_contents('local.rss', $r->getResponseBody());
			}
		} catch (HttpException $ex) {
			echo $ex;
		}*/
		?>
	</div>
	
</div>

</body>

</html>
