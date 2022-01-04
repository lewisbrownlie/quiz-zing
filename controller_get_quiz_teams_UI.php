<?php

$red_team = '
	<div id="team_red_score" class="team_score_red">
		<div id="team_red_score_top" class="team_score_top"></div>
		<div id="team_red_score_bottom" class="team_score_bottom">0</div>
	</div>
	<div id="team_red_ind_scores" class="ind_scores">
		<div id="red1" class="ind_quizzer">
			<div id="red1_light" class="ind_jump_light"></div>
			<div id="red1_name" class="ind_name"></div>
			<div id="red1_score" class="ind_score">0/0</div>
		</div>
		<div id="red2" class="ind_quizzer">
			<div id="red2_light" class="ind_jump_light"></div>
			<div id="red2_name" class="ind_name"></div>
			<div id="red2_score" class="ind_score">0/0</div>
		</div>
		<div id="red3" class="ind_quizzer">
			<div id="red3_light" class="ind_jump_light"></div>
			<div id="red3_name" class="ind_name"></div>
			<div id="red3_score" class="ind_score">0/0</div>
		</div>
		<div id="red4" class="ind_quizzer">
			<div id="red4_light" class="ind_jump_light"></div>
			<div id="red4_name" class="ind_name"></div>
			<div id="red4_score" class="ind_score">0/0</div>
		</div>
		<div id="red5" class="ind_quizzer">
			<div id="red5_light" class="ind_jump_light"></div>
			<div id="red5_name" class="ind_name"></div>
			<div id="red5_score" class="ind_score">0/0</div>
		</div>
		<div id="red1" class="ind_quizzer"></div>
	</div>
</div>
';

$yellow_team = '
	<div id="team_yellow_score" class="team_score_yellow">
		<div id="team_yellow_score_top" class="team_score_top"></div>
		<div id="team_yellow_score_bottom" class="team_score_bottom">0</div>
	</div>
	<div id="team_yellow_ind_scores" class="ind_scores">
		<div id="yellow1" class="ind_quizzer">
			<div id="yellow1_light" class="ind_jump_light"></div>
			<div id="yellow1_name" class="ind_name"></div>
			<div id="yellow1_score" class="ind_score">0/0</div>
		</div>
		<div id="yellow2" class="ind_quizzer">
			<div id="yellow2_light" class="ind_jump_light"></div>
			<div id="yellow2_name" class="ind_name"></div>
			<div id="yellow2_score" class="ind_score">0/0</div>
		</div>
		<div id="yellow3" class="ind_quizzer">
			<div id="yellow3_light" class="ind_jump_light"></div>
			<div id="yellow3_name" class="ind_name"></div>
			<div id="yellow3_score" class="ind_score">0/0</div>
		</div>
		<div id="yellow4" class="ind_quizzer">
			<div id="yellow4_light" class="ind_jump_light"></div>
			<div id="yellow4_name" class="ind_name"></div>
			<div id="yellow4_score" class="ind_score">0/0</div>
		</div>
		<div id="yellow5" class="ind_quizzer">
			<div id="yellow5_light" class="ind_jump_light"></div>
			<div id="yellow5_name" class="ind_name"></div>
			<div id="yellow5_score" class="ind_score">0/0</div>
		</div>
		<div id="yellow1" class="ind_quizzer"></div>
	</div>
</div>
';

$green_team = '
	<div id="team_green_score" class="team_score_green">
		<div id="team_green_score_top" class="team_score_top"></div>
		<div id="team_green_score_bottom" class="team_score_bottom">0</div>
	</div>
	<div id="team_red_ind_scores" class="ind_scores">
		<div id="green1" class="ind_quizzer">
			<div id="green1_light" class="ind_jump_light"></div>
			<div id="green1_name" class="ind_name"></div>
			<div id="green1_score" class="ind_score">0/0</div>
		</div>
		<div id="green2" class="ind_quizzer">
			<div id="green2_light" class="ind_jump_light"></div>
			<div id="green2_name" class="ind_name"></div>
			<div id="green2_score" class="ind_score">0/0</div>
		</div>
		<div id="green3" class="ind_quizzer">
			<div id="green3_light" class="ind_jump_light"></div>
			<div id="green3_name" class="ind_name"></div>
			<div id="green3_score" class="ind_score">0/0</div>
		</div>
		<div id="green4" class="ind_quizzer">
			<div id="green4_light" class="ind_jump_light"></div>
			<div id="green4_name" class="ind_name"></div>
			<div id="green4_score" class="ind_score">0/0</div>
		</div>
		<div id="green5" class="ind_quizzer">
			<div id="green5_light" class="ind_jump_light"></div>
			<div id="green5_name" class="ind_name"></div>
			<div id="green5_score" class="ind_score">0/0</div>
		</div>
		<div id="red1" class="ind_quizzer"></div>
	</div>
</div>
';

$retval = '';

if ($_GET['red'] == 1 && $_GET['yellow'] == 1 && $_GET['green'] == 1) {
    $retval .= '<div id="team_red" class="team_33">';
    $retval .= $red_team;
    $retval .= '<div id="team_yellow" class="team_34">';
    $retval .= $yellow_team;
    $retval .= '<div id="team_green" class="team_33">';
    $retval .= $green_team;
}
else if ($_GET['red'] == 1 && $_GET['yellow'] == 1) {
    $retval .= '<div id="team_red" class="team_50">';
    $retval .= $red_team;
    $retval .= '<div id="team_yellow" class="team_50">';
    $retval .= $yellow_team;
}
else if ($_GET['red'] == 1 && $_GET['green'] == 1) {
    $retval .= '<div id="team_red" class="team_50">';
    $retval .= $red_team;
    $retval .= '<div id="team_green" class="team_50">';
    $retval .= $green_team;
}
else if ($_GET['yellow'] == 1 && $_GET['green'] == 1) {
    $retval .= '<div id="team_yellow" class="team_50">';
    $retval .= $yellow_team;
    $retval .= '<div id="team_green" class="team_50">';
    $retval .= $green_team;
}
else if ($_GET['red'] == 1) {
    $retval .= '<div id="team_red" class="team_100">';
    $retval .= $red_team;
}
else if ($_GET['yellow'] == 1) {
    $retval .= '<div id="team_yellow" class="team_100">';
    $retval .= $yellow_team;
}
else if ($_GET['green'] == 1) {
    $retval .= '<div id="team_green" class="team_100">';
    $retval .= $green_team;
}
else {
    $retval .= "Error";
}

echo json_encode($retval);

?>