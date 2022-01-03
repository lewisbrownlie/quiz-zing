<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Let's Quiz Fam</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<link rel="stylesheet" type="text/css" href="quiz.css">
</head>
<body>

<!-- HEADER -->

<div id="header" class="header">
    <div id="left_corner" class="corner">
    	<div id="left_corner_header" class="corner_header">Question</div>
    	<div id="left_corner_body" class="corner_body">1</div>
    </div>
    <div id="top_middle" class="top_middle">
    	Title<br>
    	Division<br>
    	Room: A Round: 1
    </div>
    <div id="right_corner" class="corner">
    	<div id="right_corner_header" class="corner_header">Timer</div>
    	<div id="right_corner_body" class="corner_body">30</div>
    </div>
</div>

<!-- TEAMS (start with two teams of four quizzers for now) -->

<div id="team_red" class="team_50">
	<div id="team_red_score" class="team_score_red">
		<div id="team_red_score_top" class="team_score_top">Red Team</div>
		<div id="team_red_score_bottom" class="team_score_bottom">0</div>
	</div>
	<div id="team_red_ind_scores" class="ind_scores">
		<div id="red1" class="ind_quizzer">
			<div id="red1_light" class="ind_jump_light"></div>
			<div id="red1_name" class="ind_name">Red 1</div>
			<div id="red1_score" class="ind_score">0/0</div>
		</div>
		<div id="red2" class="ind_quizzer">
			<div id="red2_light" class="ind_jump_light"></div>
			<div id="red2_name" class="ind_name">Red 2</div>
			<div id="red2_score" class="ind_score">0/0</div>
		</div>
		<div id="red3" class="ind_quizzer">
			<div id="red3_light" class="ind_jump_light"></div>
			<div id="red3_name" class="ind_name">Red 3</div>
			<div id="red3_score" class="ind_score">0/0</div>
		</div>
		<div id="red4" class="ind_quizzer">
			<div id="red4_light" class="ind_jump_light"></div>
			<div id="red4_name" class="ind_name">Red 4</div>
			<div id="red4_score" class="ind_score">0/0</div>
		</div>
		<div id="red1" class="ind_quizzer"></div>
	</div>
</div>

<div id="team_yellow"></div>

<div id="team_green" class="team_50">
	<div id="team_green_score" class="team_score_green">
		<div id="team_green_score_top" class="team_score_top">Green Team</div>
		<div id="team_green_score_bottom" class="team_score_bottom">0</div>
	</div>
	<div id="team_red_ind_scores" class="ind_scores">
		<div id="green1" class="ind_quizzer">
			<div id="green1_light" class="ind_jump_light"></div>
			<div id="green1_name" class="ind_name">Green 1</div>
			<div id="green1_score" class="ind_score">0/0</div>
		</div>
		<div id="green2" class="ind_quizzer">
			<div id="green2_light" class="ind_jump_light"></div>
			<div id="green2_name" class="ind_name">Green 2</div>
			<div id="green2_score" class="ind_score">0/0</div>
		</div>
		<div id="green3" class="ind_quizzer">
			<div id="green3_light" class="ind_jump_light"></div>
			<div id="green3_name" class="ind_name">Green 3</div>
			<div id="green3_score" class="ind_score">0/0</div>
		</div>
		<div id="green4" class="ind_quizzer">
			<div id="green4_light" class="ind_jump_light"></div>
			<div id="green4_name" class="ind_name">Green 4</div>
			<div id="green4_score" class="ind_score">0/0</div>
		</div>
		<div id="red1" class="ind_quizzer"></div>
	</div>
</div>

<!-- FOOTER (?) (fill in with buttons?) -->

<div id="footer" class="footer"></div>

</body>
</html>