function getCookieVal(offset) { // Get Cookie Value function 
	var endstr = document.cookie.indexOf (";", offset); 
	if (endstr == -1) endstr = document.cookie.length; 
	return unescape (document.cookie.substring(offset, endstr)); 
} 

function GetCookie(name) { // Get Cookie function 
	var arg = name+"="; 
	var alen = arg.length; 
	var clen = document.cookie.length; 
	var i = 0; 
	while (i < clen) { 
		var j = i + alen; 
		if (document.cookie.substring(i, j) == arg) return getCookieVal(j); 
		i = document.cookie.indexOf(" ", i) + 1; 
		if (i == 0) break; 
	} 
	return null; 
}

// QUIZ Functions
var numberOfQuestions = 3;
var atQuestion = 1;
var questionsAnswered = 0;
var answers = new Array();
var answerResults = new Array("two", "four", "two");

// timer vars
var updateTimer;

var mainSeconds = 1;
var mainMinutes = 1;

var qSecondTimers = new Array (1,1,1);
var qMinuteTimers = new Array (0,0,0);

function updateTime() {
	
	// time tracker for main timer
	if (mainSeconds == 60){
		mainSeconds = 0;
		mainMinutes++;
	}
	
	// printing main time
	if (mainMinutes == 0){
		document.getElementById("timer1").innerHTML = "Timer: " + mainSeconds + " Seconds.";
	} else{
		document.getElementById("timer1").innerHTML = "Timer: " + mainMinutes + " Minutes and " + mainSeconds + " Seconds.";
	}
	
	// time tracker for question timers
	if (qSecondTimers[atQuestion-1] == 60){
		qMinuteTimers[atQuestion-1]++;
		qSecondTimers[atQuestion-1] = 0;
	}
	
	// printing the question timers
	if (qMinuteTimers[atQuestion-1] == 0){
		document.getElementById("timer2").innerHTML = "Question Timer: " + qSecondTimers[atQuestion-1] + " Seconds.";
	} else{
		document.getElementById("timer2").innerHTML = "Question Timer: " + qMinuteTimers[atQuestion-1] + " Minutes and " + qSecondTimers[atQuestion-1] + " Seconds.";
	}

	// increase seconds for question times
	qSecondTimers[atQuestion-1]++;
	// increase seconds for main timer
	mainSeconds++;
}

function startQuiz() {
        
        // resetting timers to 0
        for (i=0; i<3; i++){
            qSecondTimers[i] = 0;
            qMinuteTimers[i] = 0;
        }
        mainSeconds = 0;
        mainMinutes = 0;
	// set time interval to update
	updateTimer = setInterval("updateTime()",1000);
	
	// initiate answers arrays based on the number of questions
	// answers: the solution # chosen; '5' for none chosen
	for (i = 1; i < numberOfQuestions + 1; i++){
		answers[i] = "None";
	}
	
	// settings..
   document.getElementById("prevBtn").disabled = true;
	document.getElementById("q2").className = "hidden";
	document.getElementById("q3").className = "hidden";
	document.getElementById("startButton").className = "hidden";
	document.getElementById("quizButtons").className = "visible";
	document.getElementById("q1").className = "visible";
	document.getElementById("QuestionNumber").innerHTML = " Question: " + atQuestion + "/3";
}

// next question button
function nextQuestion() {	
	if ( (atQuestion+1) < 4 ) {
		document.getElementById("q"+atQuestion).className = "hidden";
		atQuestion++;
		document.getElementById("q"+atQuestion).className = "visible";
		document.getElementById("QuestionNumber").innerHTML = " Question: " + atQuestion + "/3";
		if (answers[atQuestion] != "None"){ document.getElementById(answers[atQuestion] + atQuestion).checked = true;}
	} // else do nothing..
        
        checkButtonStatus();
}

// previous question button
function previousQuestion() {	
	if ( (atQuestion-1) > 0 ) {
		document.getElementById("q"+atQuestion).className = "hidden";
		atQuestion--;
		document.getElementById("q"+atQuestion).className = "visible";
		document.getElementById("QuestionNumber").innerHTML = " Question: " + atQuestion + "/3";
		if (answers[atQuestion] != "None"){document.getElementById(answers[atQuestion] + atQuestion).checked = true;}
	}
        checkButtonStatus();
}

// check the status of the button (enable/disable based on which q user is at)
function checkButtonStatus(){
        if (atQuestion == 2) {
            document.getElementById("prevBtn").disabled = false;
            document.getElementById("nextBtn").disabled = false;
        } else if (atQuestion == 1) {
            document.getElementById("prevBtn").disabled = true;
            document.getElementById("nextBtn").disabled = false;
        } else if (atQuestion == 3) {
            document.getElementById("nextBtn").disabled = true;
            document.getElementById("prevBtn").disabled = false;
        }
}

function answerQuestion(qNumber) {
	// increase the # of questions answered if this question has not been answered already.
	if (answers[atQuestion] == "None"){
		questionsAnswered++;
		updateProgressBar();
	}
	
	// record the answer
	answers[atQuestion] = qNumber;
}

function updateProgressBar() {
	// update the progress bar
	if (questionsAnswered == 1){
		document.getElementById("innerProgressTab").className = "redProgress";
	} else if (questionsAnswered == 2){
		document.getElementById("innerProgressTab").className = "yellowProgress";
	} else if (questionsAnswered == 3){
		document.getElementById("innerProgressTab").className = "greenProgress";
		// the quiz is also finished if the 3 questions have been answered..
		
	}
}

function submitQuiz() {
   // clear timers
   window.clearInterval(updateTimer);
   document.getElementById("timer1").innerHTML = "Timer:  Finish !";
   document.getElementById("timer2").innerHTML = "Question Timer: Finish !";
        
   document.getElementById("directionsDiv").className = "hidden";
	document.getElementById("q1").className = "hidden";
	document.getElementById("q2").className = "hidden";
	document.getElementById("q3").className = "hidden";
	document.getElementById("quizButtons").className = "hidden";
	var correctAnswers = 0;
	var resultPrinting = "";
        
	// printing the results..
	for (i=1; i< 4; i++){
		if (answers[i] == answerResults[i-1]){
			resultPrinting = resultPrinting + "<p class='correctAnswer'>" + "Q" + i + ": correct, ";
                        // printing the times
                        if (qMinuteTimers[i-1] == 0){
                            resultPrinting = resultPrinting + qSecondTimers[i-1] + " Seconds." + "</p>";
                        } else{
                            resultPrinting = resultPrinting + qMinuteTimers[atQuestion-1] + " Minutes and " + qSecondTimers[i-1] + " Seconds." + "</p>";
                        }
			correctAnswers++;
		}else if (answers[i] == "None"){
			resultPrinting = resultPrinting + "<p class='noAnswer'>" + "Q" + i + ": not answered,";
                        // printing the times
                        if (qMinuteTimers[i-1] == 0){
                            resultPrinting = resultPrinting + qSecondTimers[i-1] + " Seconds." + "</p>";
                        } else{
                            resultPrinting = resultPrinting + qMinuteTimers[atQuestion-1] + " Minutes and " + qSecondTimers[i-1] + " Seconds." + "</p>";
                        }
		} else{
			resultPrinting = resultPrinting + "<p class='incorrectAnswer'>" + "Q" + i + ": incorrect,";
                        // printing the times
                        if (qMinuteTimers[i-1] == 0){
                            resultPrinting = resultPrinting + qSecondTimers[i-1] + " Seconds." + "</p>";
                        } else{
                            resultPrinting = resultPrinting + qMinuteTimers[atQuestion-1] + " Minutes and " + qSecondTimers[i-1] + " Seconds." + "</p>";
                        }
		}
	}
	
	// print correct %
	if (correctAnswers == 0){
		resultPrinting = resultPrinting + "<p class='noAnswer'>" + "Total Score: " + "0%" + "</p>";
	} else if (correctAnswers == 1){
		resultPrinting = resultPrinting + "<p class='noAnswer'>" + "Total Score: " + "33%" + "</p>";
	} else if (correctAnswers == 2){
		resultPrinting = resultPrinting + "<p class='noAnswer'>" + "Total Score: " + "66%" + "</p>";
	} else if (correctAnswers == 3){
		resultPrinting = resultPrinting + "<p class='noAnswer'>" + "Total Score: " + "100%" + "</p>";
	}
        
        // printing main time
	if (mainMinutes == 0){
            resultPrinting = resultPrinting + "<p class='noAnswer'>" + "Time Taken: " + mainSeconds + " Seconds." +  "</p>";
	} else{
            resultPrinting = resultPrinting + "<p class='noAnswer'>" + "Time Taken: " + mainMinutes + " Minutes and " + mainSeconds + " Seconds." + "</p>";
	}
        

	// print total time
	
	document.getElementById("printResults").innerHTML = resultPrinting;
	document.getElementById("resultsDiv").className = "visible";
        
}

function clearCookies(){
alert("asdfasdfasdf");
	var mydate = new Date();
	mydate.setTime(mydate.getTime() - 1);
	document.cookie = "name=; expires=" + mydate.toGMTString();
}

