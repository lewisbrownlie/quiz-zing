<?php
session_start();
require_once './DatabaseAdaptor.php';

$quizzerId = 0;
$quizzerName = "";

if (isset($_GET['quizzerId'])) {
    $theDBA->jump((int)$_GET['quizzerId'], (int)$_GET['quizId']);
    unset($_GET['quizzerId']);
}

else if ($_GET['person'] == 'quizzer') {
    // Coming from join_quiz.php (quizzer is joining quiz)
    if (!$theDBA->quizExistsInTournament((int)$_POST['quizId'], 0)) {
        // Tournament hardcoded to 0 for now
        echo "<script>alert('Not a valid Quiz Id');</script>";
        unset($_POST['quizzerId']);
        unset($_POST['quizId']);
        Header("Location: join_quiz.php");
    }
    else if (!$theDBA->quizzerExistsInQuiz((int)$_POST['quizzerId'], (int)$_POST['quizId'])) {
        echo "<script>alert('Quizzer not found in quiz');</script>";
        unset($_POST['quizzerId']);
        unset($_POST['quizId']);
        Header("Location: join_quiz.php");
    }
    else {
        unset($_POST['quizzerId']);
        unset($_POST['quizId']);
        Header("Location: quizzer.php?quizId=" . $_POST['quizId'] . "&quizzerId=" . $_POST['quizzerId']);
    }
}

else if ($_GET['person'] == 'official') {
    // Coming from join_quiz_official.php (official is joining quiz)
    if (!$theDBA->quizExistsInTournament((int)$_POST['quizId'], 0)) {
        // Tournament hardcoded to 0 for now
        echo "<script>alert('Not a valid Quiz Id');</script>";
        unset($_POST['password']);
        unset($_POST['quizId']);
        Header("Location: join_quiz_official.php");
    }
    else if (!$theDBA->verifyQuizCredentials((int)$_POST['quizId'], 0, $_POST['password'])) {
        // Tournament hardcoded to 0 for now
        echo "<script>alert('Invalid password');</script>";
        unset($_POST['password']);
        unset($_POST['quizId']);
        Header("Location: join_quiz_official.php");
    }
    else {
        unset($_POST['password']);
        unset($_POST['quizId']);
        Header("Location: quiz.php?quizId=" . $_POST['quizId'] . "&tournament=0");
        // Hardcode tournament to 0 for now
    }
}
?>