<!-- <!DOCTYPE html>           // HTML5 -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<title>
	CMPUT410 Assignment 1 - Physics Page
</title>
<link rel="stylesheet" type="text/css" href="design.css">
<script language="JavaScript" src="quizPageFunctions.js" ></script>
<?php include 'quizPageFunctions.php'; ?>
<?php parseJSONFile(); ?>
</head>

<body>

<div id="centerPageContainer">
	<div id="bodyContainerFull">
		<div id="leftSide"> 
			<div id="noLogin" class="hidden">Please <a href="index.php">register</a> before taking any quizzes !</div>
				<?php printQuestion(2)?>
		</div>
		
		
		<div id="rightSide">
			<button id="prevBtn" value="prev" onclick="previousQuestion()">Prev</button>
			<button id="nextBtn" value="next" onclick="nextQuestion()">Next</button>
			<button id="submitQuizBtn" value="submitQuiz" onclick="submitQuiz()">Submit</button>
			<p id="timer1"> Quiz Timer: 0 Seconds.</p>
			<p id="timer2"> Question Timer: 0 Seconds.</p>
			<p id="QuestionNumber"> Question: 0/3</p>
			<div id="progressTabBg"><div id="innerProgressTab"></div></div>
		</div>

	</div>
</div>
<div>sd
</div>

</body>

</html>

