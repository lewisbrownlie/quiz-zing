<?php

if (isset($_POST['quiz'])) {
    unset($_POST['quiz']);
    header("Location: quiz.php");
}

?>