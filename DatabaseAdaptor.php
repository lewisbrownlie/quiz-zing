<?php

// This class has a constructor to connect to a database. The given
// code assumes you have created a database named 'quotes' inside MariaDB.
//
// The original class was created by Rick Mercer and Lewis Brownlie has
// adapted it for use in the Quizzing project.
//
// Authors: Rick Mercer and Lewis Brownlie
//
// c:\xampp\mysql\bin\mysql -u root
class DatabaseAdaptor {

    private $DB;

    // The instance variable used in every method below
    // Connect to an existing data based named 'first'
    public function __construct() {
        $dataBase = 'mysql:dbname=quizzing;charset=utf8;host=127.0.0.1';
        $user = 'root';
        $password = ''; // Empty string with XAMPP install
        try {
            $this->DB = new PDO($dataBase, $user, $password);
            $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo ('Error establishing Connection');
            exit();
        }
    }

    /*
     * public function addQuote($quote, $author) {
     * //$stmt = $this->DB->prepare("INSERT INTO quotations (added, quote, author, rating, flagged) VALUES ('" .
     * // "now()" . "', '" . $quote . "', '" . $author . "', '" . "0" . "', '" . "0" . "');");
     * $stmt = $this->DB->prepare("INSERT INTO quotations (added, quote, author, rating, flagged) VALUES ('" .
     * "now()', :bind_quote, :bind_author, '0', '0');");
     * $stmt->bindParam(':bind_quote', $quote);
     * $stmt->bindParam(':bind_author', $author);
     * $stmt->execute();
     * }
     *
     * public function getAllUsers(){
     * $stmt = $this->DB->prepare("SELECT * from users;");
     * $stmt->execute();
     * return $stmt->fetchAll(PDO::FETCH_ASSOC);
     * }
     */
    private function tournamentExists($tournamentId) {
        assert(is_int($tournamentId), "Tournament ID must be of type int, is of type " . gettype($tournamentId));

        $stmt = $this->DB->prepare("SELECT id FROM tournaments");
        $stmt->execute();
        $ids = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($ids as $anId)
            if ($anId['id'] == $tournamentId)
                return true;

        return false;
    }

    public function quizExistsInTournament($quizId, $tournamentId) {
        // Sanitize inputs
        assert(is_int($tournamentId), "Tournament ID must be of type int");
        assert(is_int($quizId), "Quiz ID must be of type int");

        $stmt = $this->DB->prepare("SELECT quiz_id FROM tournament_" . $tournamentId . "_quizzes");
        $stmt->execute();
        $quizIds = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($quizIds as $anId)
            if ($anId['quiz_id'] == $quizId)
                return true;

        return false;
    }
    
    private function teamExistsInTournament($teamId, $tournamentId) {
        // Sanitize inputs
        assert(is_int($tournamentId), "Tournament ID must be of type int");
        assert(is_int($teamId), "Team ID must be of type int");
        
        $stmt = $this->DB->prepare("SELECT team_id FROM tournament_" . $tournamentId . "_teams");
        $stmt->execute();
        $teamIds = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($teamIds as $anId)
            if ($anId['team_id'] == $teamId)
                return true;
                
        return false;
    }
    
    private function quizzerExistsInTeam($quizzerId, $teamId) {
        // Sanitize inputs
        assert(is_int($quizzerId), "Quizzer ID must be of type int");
        assert(is_int($teamId), "Team ID must be of type int");
        
        $stmt = $this->DB->prepare("SELECT quizzer_id FROM team_" . $teamId);
        $stmt->execute();
        $quizzerIds = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($quizzerIds as $anId)
            if ($anId['quizzer_id'] == $quizzerId)
                return true;
                
        return false;
    }
    
    public function quizzerExistsInQuiz($quizzerId, $quizId) {
        // Sanitize inputs
        assert(is_int($quizzerId), "Quizzer ID must be of type int");
        assert(is_int($quizId), "Quiz ID must be of type int");
        
        $stmt = $this->DB->prepare("SELECT quizzer_id FROM quiz" . $quizId);
        $stmt->execute();
        $quizzerIds = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($quizzerIds as $anId)
            if ($anId['quizzer_id'] == $quizzerId)
                return true;
                
        return false;
    }

    public function createQuiz($quizId, $quizPassword, $quizName, $tournamentId) {
        if (! $this->tournamentExists($tournamentId))
            return -1; // failure: tournament doesn't exist

        if ($this->quizExistsInTournament($quizId, $tournamentId))
            return -2; // failure: quiz already exists in the tournament

        // Sanitize inputs for variables that we can't always use bindParam for
        assert(is_int($tournamentId), "Tournament ID must be of type int");
        assert(is_int($quizId), "Quiz ID must be of type int");
        assert(!$this->quizExistsInTournament($quizId, $tournamentId), "Non-unique quiz ID");

        $actions = "CREATE TABLE quiz" . $quizId . " (row int, quizzer_name varchar(255), quizzer_id int,
            team_id int, jumped boolean, q1 int, q2 int, q3 int, q4 int, q5 int, q6 int, q7 int, q8 int, q9 int,
            q10 int, q11 int, q12 int, q13 int, q14 int, q15 int, q16 int, q17 int, q18 int,
            q19 int, q20 int, q21 int, q22 int, q23 int, correct int, errors int, score int,
            fouls int, captain int);";

        $actions .= "INSERT INTO tournament_" . $tournamentId . "_quizzes VALUES (:bind_quizId, :bind_quizPassword, :bind_quizName);";
        
        // Create 6 dummy rows per team (1 for team stats, 5 for quizzers)
        for ($i = 1; $i <= 18; $i ++) {
            $actions .= "INSERT INTO quiz" . $quizId . " (row, jumped, correct, errors, score, fouls)
                VALUES ('" . $i . "', false, '0', '0', '0', '0');";
        }

        $stmt = $this->DB->prepare($actions);
        $stmt->bindParam(':bind_quizId', $quizId);
        $stmt->bindParam(':bind_quizPassword', $quizPassword);
        $stmt->bindParam(':bind_quizName', $quizName);
        $stmt->execute();

        return 0; // success
    }

    public function deleteQuiz($quizId, $tournamentId) {
        if (! $this->tournamentExists($tournamentId))
            return - 1; // failure: tournament doesn't exist

        if (! $this->quizExistsInTournament($quizId, $tournamentId))
            return - 2; // failure: quiz doesn't exist in the tournament

        // Sanitize inputs for variables that we can't always use bindParam for
        assert(is_int($tournamentId), "Tournament ID must be of type int");
        assert(is_int($quizId), "Quiz ID must be of type int");

        $actions = "DROP TABLE quiz" . $quizId . ";";
        $actions .= "DELETE FROM tournament_" . $tournamentId . "_quizzes WHERE quiz_id=:bind_quizId;";
        
        $stmt = $this->DB->prepare($actions);
        $stmt->bindParam(':bind_quizId', $quizId);
        $stmt->execute();

        return 0;
    }

    public function addQuizzerToQuiz($quizzerId, $quizzerName, $captain, $quizId, $tournamentId, $team, $position, $teamId = null) {
        if (! $this->quizExistsInTournament($quizId, $tournamentId))
            return -1; // Quiz doesn't exist in tournament
        
            if (($teamId != NULL) & ($teamId != -1)) {
            if (! $this->quizzerExistsInTeam($quizzerId, $teamId) |
                ! $this->teamExistsInTournament($teamId, $tournamentId))
                return -2; // Team is invalid
            assert(is_int($teamId), "Team ID must be of type int");
        }
        
        // Sanitize inputs for variables that we can't always use bindParam for
        assert(is_int($tournamentId), "Tournament ID must be of type int");
        assert(is_int($quizId), "Quiz ID must be of type int");
        assert(is_int($quizzerId), "Quizzer ID must be of type int");
        
        $row = (($team - 1) * 6) + $position + 1;
        // e.g. if team is 2 and position is 3, row will be 10
        
        if ($teamId == NULL) {
            $actions = "UPDATE quiz" . $quizId . " SET quizzer_name=:bind_quizzerName, quizzer_id=:bind_quizzerId, captain=:bind_captain WHERE row=:bind_row;";
            
            $stmt = $this->DB->prepare($actions);
            $stmt->bindParam(':bind_quizzerName', $quizzerName);
            $stmt->bindParam(':bind_quizzerId', $quizzerId);
            $stmt->bindParam(':bind_captain', $captain);
            $stmt->bindParam(':bind_row', $row);
            $stmt->execute();
        }
        else {
            $actions = "UPDATE quiz" . $quizId . " SET quizzer_name=:bind_quizzerName, quizzer_id=:bind_quizzerId, captain=:bind_captain, team_id=:bind_teamId WHERE row=:bind_row;";
            
            $stmt = $this->DB->prepare($actions);
            $stmt->bindParam(':bind_quizzerName', $quizzerName);
            $stmt->bindParam(':bind_quizzerId', $quizzerId);
            $stmt->bindParam(':bind_captain', $captain);
            $stmt->bindParam(':bind_teamId', $teamId);
            $stmt->bindParam(':bind_row', $row);
            $stmt->execute();
        }
        
        return 0;
    }
    
    public function getQuizzersOnTeam($teamId, $tournamentId) {
        assert($this->teamExistsInTournament($teamId, $tournamentId));
        assert(is_int($teamId));
        assert(is_int($tournamentId));
        
        $stmt = $this->DB->prepare("SELECT quizzer_id, quizzer_name FROM team_" . $teamId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getTeamsInTournament($tournamentId) {
        assert($this->tournamentExists($tournamentId));
        assert(is_int($tournamentId));
        
        $stmt = $this->DB->prepare("SELECT * FROM tournament_" . $tournamentId . "_teams");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getTournaments() {
        $stmt = $this->DB->prepare("SELECT * FROM tournaments");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getQuizzerName($quizzerId) {
        $stmt = $this->DB->prepare("SELECT quizzer_name FROM quizzers WHERE quizzer_id=:bind_quizzerId");
        $stmt->bindParam(':bind_quizzerId', $quizzerId);
        $stmt->execute();
        
        $retval = "";
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($array) == 1) {
            $retval = $array[0]['quizzer_name'];
        }
        return $retval;
    }
    
    public function getTeamName($teamId, $tournamentId) {
        $stmt = $this->DB->prepare("SELECT team_name FROM tournament_" . $tournamentId . "_teams WHERE team_id=:bind_teamId");
        $stmt->bindParam(':bind_teamId', $teamId);
        $stmt->execute();
        
        $retval = "";
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($array) == 1) {
            $retval = $array[0]['team_name'];
        }
        return $retval;
    }
    
    public function getQuizzerInfoFromQuiz($quizId, $row) {
        $stmt = $this->DB->prepare("SELECT * FROM quiz" . $quizId . " WHERE row=:bind_row");
        $stmt->bindParam(':bind_row', $row);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    
    public function jump($quizzerId, $quizId) {
        assert($this->quizzerExistsInQuiz($quizzerId, $quizId), "Quizzer isn't in quiz");
        $stmt = $this->DB->prepare("UPDATE quiz" . $quizId . " SET jumped=true WHERE quizzer_id=:bind_quizzerId");
        $stmt->bindParam(':bind_quizzerId', $quizzerId);
        $stmt->execute();
    }
    
    public function resetJumps($quizId) {
        assert(is_int($quizId), "Quiz ID isn't an int");
        $stmt = $this->DB->prepare("UPDATE quiz" . $quizId . " SET jumped=false");
        $stmt->execute();
    }
    
    public function verifyQuizCredentials($quizId, $tournamentId, $password) {
        assert($this->quizExistsInTournament($quizId, $tournamentId));
        $stmt = $this->DB->prepare("SELECT quiz_password FROM tournament_" . $tournamentId . "_quizzes WHERE quiz_id=:bind_quizId");
        $stmt->bindParam(":bind_quizId", $quizId);
        $stmt->execute();
        
        $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($array) != 1) {
            return false;
        }
        $passwordFromSQL = $array[0]['quiz_password'];
        return ($password == $passwordFromSQL);
    }
}

$theDBA = new DatabaseAdaptor();

//echo $theDBA->createQuiz(2345, 'password2', 'Quiz room test', 0);
// echo $theDBA->deleteQuiz(2345, 0);
//echo $theDBA->addQuizzerToQuiz(568, 'Levi', 1, 2345, 0, 1, 2);
//echo $theDBA->addQuizzerToQuiz(568, 'Levi', 1, 2345, 0, 1, 2, 567);
//print_r($theDBA->getQuizzersOnTeam(567, 0));
//print_r($theDBA->getTeamsInTournament(0));
//print($theDBA->idExists(0));
//print($theDBA->idExists(7898));
//print_r($theDBA->getQuizzerInfoFromQuiz(9892, 1));
?>
