<?php
session_start();
$_SESSION["team1"] = 0;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Create Quiz</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h2>Create quiz (under construction)</h2>
Hardcoded to practice mode for now (t=0)<br>

<form action="controller_create_quiz.php" method="post">

Tournament:
<select name="tournament" id="tournament">
	<!-- This gets initialized in the <script> block below with all the tournaments -->
</select>
<br>

<div class='team'>
	Team 1:<br>
	<select name="team1" id="team1">
		<option value=-1 selected>---------------</option>
	</select>
	
	<br>Quizzer 1:<br>
	<select name="t1q1" id="t1q1">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 2:<br>
	<select name="t1q2" id="t1q2">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 3:<br>
	<select name="t1q3" id="t1q3">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 4:<br>
	<select name="t1q4" id="t1q4">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 5:<br>
	<select name="t1q5" id="t1q5">
		<option value=-1 selected>---------------</option>
	</select>
</div>

<div class='team'>
	Team 2:<br>
	<select name="team2" id="team2">
		<option value=-1 selected>---------------</option>
	</select>
	
	<br>Quizzer 1:<br>
	<select name="t2q1" id="t2q1">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 2:<br>
	<select name="t2q2" id="t2q2">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 3:<br>
	<select name="t2q3" id="t2q3">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 4:<br>
	<select name="t2q4" id="t2q4">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 5:<br>
	<select name="t2q5" id="t2q5">
		<option value=-1 selected>---------------</option>
	</select>
</div>

<div class='team'>
	Team 3:<br>
	<select name="team3" id="team3">
		<option value=-1 selected>---------------</option>
	</select>
	
	<br>Quizzer 1:<br>
	<select name="t3q1" id="t3q1">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 2:<br>
	<select name="t3q2" id="t3q2">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 3:<br>
	<select name="t3q3" id="t3q3">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 4:<br>
	<select name="t3q4" id="t3q4">
		<option value=-1 selected>---------------</option>
	</select>
	<br>Quizzer 5:<br>
	<select name="t3q5" id="t3q5">
		<option value=-1 selected>---------------</option>
	</select>
</div>

<input type="text" id="quizName" name="quizName" placeholder="Quiz Name">
<input type="password" id="password" name="password" placeholder="Password">

<br><input type="submit">
</form>

<script>
tournamentElement = document.getElementById("tournament");
tournamentElement.addEventListener("change", tournamentHandler);

team1 = document.getElementById("team1");
team1.addEventListener("change", team1Handler);

team2 = document.getElementById("team2");
team2.addEventListener("change", team2Handler);

team3 = document.getElementById("team3");
team3.addEventListener("change", team3Handler);

// Initialize the tournaments' innerHTML
var ajax = new XMLHttpRequest();
ajax.open("GET", "controller_create_quiz.php?onload=1", true);
ajax.send();
ajax.onreadystatechange= function() {
	if (ajax.readyState == 4 && ajax.status == 200) {
		tournamentElement.innerHTML = JSON.parse(ajax.responseText);
	}
}

function tournamentHandler() {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller_create_quiz.php?tournament=" + tournamentElement.value, true);
	ajax.send();
	
	ajax.onreadystatechange= function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			document.getElementById("team1").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("team2").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("team3").innerHTML = JSON.parse(ajax.responseText);
			for (var i = 1; i <= 3; i++)
				for (var j = 1; j <= 5; j++)
					document.getElementById("t"+i+"q"+j).innerHTML = "<option value=-1 selected>---------------</option>";
		}
	}
}

function team1Handler() {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller_create_quiz.php?team=" + team1.value + "&tournament=" + tournamentElement.value, true);
	ajax.send();
	
	ajax.onreadystatechange= function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			document.getElementById("t1q1").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t1q2").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t1q3").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t1q4").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t1q5").innerHTML = JSON.parse(ajax.responseText);
		}
	}
}

function team2Handler() {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller_create_quiz.php?team=" + team2.value + "&tournament=" + tournamentElement.value, true);
	ajax.send();
	
	ajax.onreadystatechange= function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			document.getElementById("t2q1").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t2q2").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t2q3").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t2q4").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t2q5").innerHTML = JSON.parse(ajax.responseText);
		}
	}
}

function team3Handler() {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller_create_quiz.php?team=" + team3.value + "&tournament=" + tournamentElement.value, true);
	ajax.send();
	
	ajax.onreadystatechange= function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			document.getElementById("t3q1").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t3q2").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t3q3").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t3q4").innerHTML = JSON.parse(ajax.responseText);
			document.getElementById("t3q5").innerHTML = JSON.parse(ajax.responseText);
		}
	}
}
</script>

</body>
</html>