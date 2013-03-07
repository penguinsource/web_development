<!-- <!DOCTYPE html>           // HTML5 -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<title>
	410 Asn2
</title>
<link rel="stylesheet" type="text/css" href="design.css">
<script>
	function takeQuiz(){ window.location = "quizPage.php"; }
	function goToAdmin(){ window.location = "quizPage.php"; }
</script>

</head>

<body>
<noscript>
<?php $javascriptEnabled = 0; ?>
Javascript is disabled !
</noscript>

<div id="centerPageContainer">

<div id="simpleBodyContainer">
<H2>
	Welcome ! Would you like to:
</H2>
<br>
<button onClick="takeQuiz()"> Take Quiz </button>
<br>
<button onClick="goToAdmin()"> Admin Module </button>
<br>
<button onClick="logout"> Logout </button>
<?php echo "aa: " . $javascriptEnabled;?>

</div>


</div>


</body>

</html>

