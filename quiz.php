<?php
    session_start();
    /*
    require_once './DatabaseAdaptor.php';
    
    // Create the quiz
    
    $randomNum = 0;
    do {
        $randomNum = rand(1000, 9999);
    } while ($theDBA->quizExistsInTournament($randomNum, (int)$_POST['tournament']));
    // do while the id exists (until it doesn't)
    
    
   
   $theDBA->createQuiz($randomNum, $_POST['password'], $_POST['quizName'], (int)$_POST['tournament']);
   
   for ($i = 0; $i < 3; $i++) {
       $team = "team" . ($i+1);
       $tnq = "t" . ($i+1) . "q";
       
       $teamName = $theDBA->getTeamName((int)$_POST[$team], $_POST['tournament']);
       $theDBA->addQuizzerToQuiz((int)$_POST[$team], $teamName, NULL, $randomNum, (int)$_POST['tournament'], ($i+1), 0);
       
       for ($j = 0; $j < 5; $j++) {
           $tnqn = $tnq . ($j+1);
           $quizzerName = $theDBA->getQuizzerName($_POST[$tnqn]);
           $theDBA->addQuizzerToQuiz((int)$_POST[$tnqn], $quizzerName, NULL, $randomNum, (int)$_POST['tournament'], ($i+1), ($j+1), (int)$_POST[$team]);
       }
   }*/
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Let's Quiz Fam</title>
<link rel="stylesheet" type="text/css" href="styles.css"> <!-- -->
</head>
<body>

<h2>Quiz (under construction)</h2>

<div id="scoreboard"></div>
<!-- Get all elements from $_POST and put them here -->

<?php

require_once './DatabaseAdaptor.php';

for ($i = 1; $i <= 3; $i++) {
    $teamId = $theDBA->getQuizzerInfoFromQuiz($_GET['quiz'], (1+($i-1)*6))['quizzer_id'];
    if ($teamId != -1) {
        echo "<div class='team_score'>";
        if ($i == 1) {
            echo "<div class='team_red' ";
        }
        else if ($i == 2) {
            echo "<div class='team_yellow' ";
        }
        else {
            echo "<div class='team_green' ";
        }
        
        $teamInfo = $theDBA->getQuizzerInfoFromQuiz($_GET['quiz'], (($i-1)*6+1));
        $teamName = $teamInfo['quizzer_name'];
        $teamScore = $teamInfo['score'];
        
        echo "id='team" . $i . "'><span>" . $teamName . "</span><br>";
        echo $teamScore . "</div>";
        
        for ($j = 1; $j <= 5; $j++) {
            $array = $theDBA->getQuizzerInfoFromQuiz($_GET['quiz'], (1 + ($i-1) * 6 + $j));
            $quizzerName = $array['quizzer_name'];
            $quizzerId = $array['quizzer_id'];
            $correct = $array['correct'];
            $errors = $array['errors'];
            
            echo "<div class='quizzer_score'>";
            if (($quizzerId != -1) & ($quizzerId != NULL)) {
                echo "<div class='quizzer_score1'>" . $quizzerName . "</div>";
                echo "<div class='quizzer_score2'>" . $correct . "/" . $errors . "</div>";
            }
            echo "</div>";
        }
        echo "</div>"; // class='team_score'
    }
}
?>

<button id="inPlay">Next Jump</button>
<button id="reset">Reset Buzzers</button>

<script>
document.getElementById("inPlay").addEventListener("click", jump);
document.getElementById("reset").addEventListener("click", reset);

<?php
echo "var quiz = " . $_GET['quiz'] . ";";
echo "var tournament = " . $_GET['tournament'] . ";";
?>

function jump() {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "jump.php?quiz=" + quiz + "&tournament=" + tournament, true);
	ajax.send();
	
	ajax.onreadystatechange= function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			var array = JSON.parse(ajax.responseText);
			var quizzerId = array[0];
			var quizzerName = array[1];
			var teamId = array[2];
			var teamName = array[3];
			alert(quizzerName + " from " + teamName + " has jumped");
		}
	}
}

function reset() {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller_create_quiz.php?reset=" + quiz, true);
	ajax.send();
	
	ajax.onreadystatechange= function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			//alert("The buzzers have been reset");
			alert(ajax.responseText);
		}
	}
}
</script>

</body>
</html>