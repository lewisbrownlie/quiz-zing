<?php
session_start();
require_once './DatabaseAdaptor.php';

while(1) {
    for ($i = 1; $i <= 18; $i++) {
        $array = $theDBA->getQuizzerInfoFromQuiz($_GET['quiz'], $i);
        //$array = $theDBA->getQuizzerInfoFromQuiz(9297, $i);
        if ($array['jumped'] == true) {
            $retval = [];
            $retval[] = $array['quizzer_id'];
            $retval[] = $array['quizzer_name'];
            $retval[] = $array['team_id'];
            $retval[] = $theDBA->getTeamName($retval[2], $_GET['tournament']);
            echo json_encode($retval);
            break 2; // breaks out of if and for
        }
    }
}

?>