<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Quizzing</title>
</head>
<body>

<h2>Join quiz as quizzer (under construction)</h2>
<?php echo "Quizzer: " . $_GET['quizzerId'] . "<br>Quiz: " . $_GET['quizId'];?>

<br><button id="jump" name="jump">Jump!</button>

<script>
document.getElementById("jump").addEventListener("click", jump);

<?php
	echo "var quiz = " . $_GET['quizId'] . ";";
	echo "var quizzer = " . $_GET['quizzerId'] . ";";
?>

function jump() {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller_join_quiz.php?quizId=" + quiz + "&quizzerId=" + quizzer, true);
	ajax.send();
	
	ajax.onreadystatechange= function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			alert("You jumped");
		}
	}
}
</script>

</body>
</html>