<?php

if (isset($_POST['quizOfficial'])) {
    unset($_POST['quizOfficial']);
    header("Location: quizOfficial.php");
}

?>