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

<h2>Choose a quiz to join (under construction)</h2>
Tournament temporarily hardcoded to "practice"<br>

<form action='controller_join_quiz.php?person=official' method='post'>
<input type="text" name="quizId" placeholder="Quiz ID"><br>
<input type="password" name="password" placeholder="Password"><br>
<input type="submit">
</form>

</body>
</html>