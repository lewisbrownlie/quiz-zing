<?php
require_once './DatabaseAdaptor.php';

if (isset($_GET['tournament']) & !isset($_GET['team'])) {
    /* This indicates that we want to return the teams in the tournament */
    
    if ($_GET['tournament'] == -1)
        $teams = array();
    else
        $teams = $theDBA->getTeamsInTournament((int)$_GET['tournament']);
    
    $retval = "<option value=-1>-----------------</option>";
    
    foreach ($teams as $team) {
        $retval .= "<option value=" . $team['team_id'] . ">" . $team['team_name'] . "</option>";
    }
    
    echo json_encode($retval);
}

else if (isset($_GET['tournament']) & isset($_GET['team'])) {
    /* This indicates that we want to get the quizzers on a particular team */
    
    if ($_GET['team'] == -1)
        $quizzers = array();
    else
        $quizzers = $theDBA->getQuizzersOnTeam((int)$_GET['team'], (int)$_GET['tournament']);
    
    $retval = "<option value=-1>-----------------</option>";
    
    foreach ($quizzers as $quizzer) {
        $retval .= "<option value=" . $quizzer['quizzer_id'] . ">" . $quizzer['quizzer_name'] . "</option>";
    }
    
    echo json_encode($retval);
}

else if (isset($_GET['onload'])) {
    /* This indicates that the create_quiz page just loaded, so we need all tournaments */
    
    $tournaments = $theDBA->getTournaments();
    
    $retval = "<option value=-1>-----------------</option>";
    
    foreach($tournaments as $tournament) {
        $retval .= "<option value=" . $tournament['id'] . ">" . $tournament['name'] . "</option>";
    }
    
    echo json_encode($retval);
}

else if (isset($_GET['reset'])) {
    /* We are coming from quiz.php and need to reset the jumps */
    $theDBA->resetJumps((int)$_GET['reset']);
    unset($_GET['reset']);
}

else {
    /* This indicates that we should create the quiz then go to quiz.php */
    
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
    }
    
    header("Location: quiz.php?quiz=" . $randomNum . "&tournament=" . $_POST['tournament']);
}
?>