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
</head>

<body>

<div id="centerPageContainer">

<ul class="sitetabs">
  <li><a href="file1.html" class="selected">Physics</a></li>
  <li><a href="file2.html">Math</a></li>
  <li><a href="file3.html">Programming</a></li>
  <div id="signoutBtn" class="visible"><li><a href="index.php" id="SignOut" action="clearCookies()" >Sign Out</a></li> </div>
</ul>


<div id="titleContainer">
	<div id="headerText">
		<p> Physics Quiz for <script> document.write(GetCookie("name")); </script></p>
		<p id="timer1"> Timer: 0 Seconds.</p>
		<p id="timer2"> Question Timer: 0 Seconds.</p>
		<p id="QuestionNumber"> Question: 0/3</p>
		
		<div id="progressTabBg"><div id="innerProgressTab"></div></div>
	</div>
</div>

<div id="noLogin" class="hidden">Please <a href="index.php">register</a> before taking any quizzes !</div>

<div id="bodyContainer">
	<p id="directionsDiv">	Directions: Closed book, no talking, and one hour.</p>
	
	<div id="quizButtons" class="hidden">
		<button id="prevBtn" value="prev" onclick="previousQuestion()">Previous Question</button>
		<button id="nextBtn" value="next" onclick="nextQuestion()">Next Question</button>
		<button id="submitQuizBtn" value="submitQuiz" onclick="submitQuiz()">Submit the Quiz !</button>
	</div>
		
	<div id="resultsDiv" class="hidden">
		<p id="resultsText"> Results for <script> document.write(GetCookie("name")); </script> </p>
		<div id=printResults></div>
	</div>
	
	<div id="q1" class="hidden">
	<div class="question">
		<p> 1. The approximate weight (on Earth) of a mass of 2 kg is: </p>
		<ul class="question">
			<li> <input type="radio" id="one1" name="ans" onclick="answerQuestion('one');"><label for="one">2000 N</label></li>
			<li> <input type="radio" id="two1" name="ans" onclick="answerQuestion('two');"><label for="two">20 N</label></li>
			<li> <input type="radio" id="three1" name="ans" onclick="answerQuestion('three');"><label for="three">200 N</label> <li>
			<li> <input type="radio" id="four1" name="ans" onclick="answerQuestion('four');"> <label for="four">0.2 N</label></li>
		</ul>
	</div>
	</div>
	
	<div id="q2" class="hidden">
	<div class="question">
		<img src="http://intmstat.com/kinematics/Image42.gif" width="300" height="175" alt="kinematics">
		<p> 2. Consider the graph of velocity (in m/s) vs. time
			(in s) given above. In the first 8 seconds, the object has traveled a distance of:</p>
		<ul class="question">
			<li> <input type="radio" id="one2" name="ans" onclick="answerQuestion('one');"><label for="one2" >100 m</label></li>
			<li> <input type="radio" id="two2" name="ans" onclick="answerQuestion('two');"><label for="two2" >160 m</label></li>
			<li> <input type="radio" id="three2" name="ans" onclick="answerQuestion('three');"><label for="three2" >110 m</label></li>
			<li> <input type="radio" id="four2" name="ans" onclick="answerQuestion('four');"> <label for="four2" >20 m</label></li>
		</ul>
		
	</div>
	</div>
	
	<div id="q3" class="hidden">
	<div class="question">
		<p> 3. A bus covers a distance of 240 miles in 4 hours. Its average speed in miles per hour is:</p>
		<ul class="question">
			<li> <input type="radio" id="one3" name="ans" onclick="answerQuestion('one');"><label for="one3">6</label></li>
			<li> <input type="radio" id="two3" name="ans" onclick="answerQuestion('two');"><label for="two3">60</label></li>
			<li> <input type="radio" id="three3" name="ans" onclick="answerQuestion('three');"><label for="three3">960</label></li>
			<li> <input type="radio" id="four3" name="ans" onclick="answerQuestion('four');"> <label for="four3">None of these</label></li>
		</ul>
		
	</div>
	</div>
	
	<div id="startButton">
	<button id="startButton" onclick="startQuiz()"> Start the Quiz !</button>
	</div>
</div>
	
</div>

<script>
	// unregistered users can't see the quiz !
	if (GetCookie("name") == null || GetCookie("name") == "") {
		document.getElementById("bodyContainer").className="hidden";
		document.getElementById("noLogin").className="visible";
		document.getElementById("signoutBtn").className="hidden";
		
	}
</script>

</body>

</html>

