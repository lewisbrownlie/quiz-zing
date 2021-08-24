<?php

if (isset($_POST['createQuiz'])) {
    unset($_POST['createQuiz']);
    header("Location: create_quiz.php");
}
else if (isset($_POST['joinQuizAsQuizzer'])) {
    unset($_POST['joinQuizAsQuizzer']);
    header("Location: join_quiz.php");
}

else if (isset($_POST['joinQuizAsOfficial'])) {
    unset($_POST['joinQuizAsOfficial']);
    header("Location: join_quiz_official.php");
}

?>