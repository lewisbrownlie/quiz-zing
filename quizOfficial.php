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
		<div id="green5" class="ind_quizzer">
			<div id="green5_light" class="ind_jump_light"></div>
			<div id="green5_name" class="ind_name">Green 5</div>
			<div id="green5_score" class="ind_score">0/0</div>
		</div>
		<div id="red1" class="ind_quizzer"></div>
	</div>
</div>

<!-- FOOTER (?) (fill in with buttons?) -->

<div id="footer" class="footer">
	<div id="setup_button" class="button_9_two">Setup<br>Exit</div>
	<div id="lineups_button" class="button_9_two">Line<br>Ups</div>
	<div id="timeout_button" class="button_9_two">Time<br>Out</div>
	<div id="timer_button" class="button_9_two">Reset<br>Timer</div>
	<div id="next_jump_button" class="button_28_one">Next<br>Jump</div>
	<div id="no_jump_button" class="button_9_three">No<br>Jump<br>(5 sec)</div>
	<div id="info_button" class="button_9_one">Info</div>
	<div id="challenge_button" class="button_9_three">Challenge<br>Appeal<br>Foul</div>
	<div id="score_sheet_button" class="button_9_two">Score<br>Sheet</div>
</div>

<!-- MENUS (all menus are inside the master menu outline) -->

<div id="master_menu_outline" class="master_menu_outline">
	<div id="lineups_menu" class="menu">
		<form id="lineups_form">
			<div id="lineup_labels" class="lineups_labels">
				<div class="lineups_label">Team Name:</div>
				<div class="lineups_label">Quizzer 1:</div>
				<div class="lineups_label">Quizzer 2:</div>
				<div class="lineups_label">Quizzer 3:</div>
				<div class="lineups_label">Quizzer 4:</div>
				<div class="lineups_label">Quizzer 5:</div>
			</div>
			
			<div id="lineup_red" class="lineups_team">
				<div class="lineups_dropdown">
					<input id="lineup_red_teamname" list="team_list" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					&nbsp;C CC
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_red1" list="lineup_list_red" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_red1_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_red1_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_red2" list="lineup_list_red" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_red2_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_red2_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_red3" list="lineup_list_red" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_red3_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_red3_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_red4" list="lineup_list_red" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_red4_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_red4_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_red5" list="lineup_list_red" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_red5_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_red5_CC" class="lineups_checkbox">
				</div>
			</div>
			
			<div id="lineup_yellow" class="lineups_team">
				<div class="lineups_dropdown">
					<input id="lineup_yellow_teamname" list="team_list" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					&nbsp;C CC
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_yellow1" list="lineup_list_yellow" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_yellow1_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_yellow1_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_yellow2" list="lineup_list_yellow" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_yellow2_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_yellow2_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_yellow3" list="lineup_list_yellow" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_yellow3_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_yellow3_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_yellow4" list="lineup_list_yellow" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_yellow4_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_yellow4_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_yellow5" list="lineup_list_yellow" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_yellow5_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_yellow5_CC" class="lineups_checkbox">
				</div>
			</div>
			
			<div id="lineup_green" class="lineups_team">
				<div class="lineups_dropdown">
					<input id="lineup_green_teamname" list="team_list" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					&nbsp;C CC
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_green1" list="lineup_list_green" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_green1_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_green1_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_green2" list="lineup_list_green" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_green2_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_green2_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_green3" list="lineup_list_green" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_green3_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_green3_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_green4" list="lineup_list_green" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_green4_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_green4_CC" class="lineups_checkbox">
				</div>
				
				<div class="lineups_dropdown">
					<input id="lineup_green5" list="lineup_list_green" class="lineups_dropdown_input">
				</div>
				<div class="lineups_checkboxes">
					<input type="checkbox" id="lineup_green5_C" class="lineups_checkbox">
					<input type="checkbox" id="lineup_green5_CC" class="lineups_checkbox">
				</div>
			</div>
			<input type="submit" value="OK">
			<input id = "lineups_cancel" type="button" value="Cancel">
		</form>
	</div>
</div>

<datalist id="lineup_list_red">
	<option value="Your Mom">
</datalist>
<datalist id="lineup_list_yellow">
	<option value="Your Mom">
</datalist>
<datalist id="lineup_list_green">
</datalist>

<datalist id="team_list">
	<option value="Your Mom's Team">
</datalist>

<script>

document.getElementById("lineups_button").addEventListener("click", lineups);
document.getElementById("lineups_form").onsubmit = handle_lineups;
document.getElementById("lineups_cancel").addEventListener("click", handle_lineups_cancel);
var lineups_menu = document.getElementById("lineups_menu");

function lineups() {
	lineups_menu.style.display = "block";
}

function handle_lineups_cancel() {
	lineups_menu.style.display = "none";
	return false;
}

function handle_lineups() {
	var form_array = document.forms["lineups_form"];
	var RC=0; var RCC=0; var YC=0; var YCC=0; var GC=0; var GCC=0;
	
	if (document.getElementById("lineup_red1_C").checked) RC++;
	if (document.getElementById("lineup_red2_C").checked) RC++;
	if (document.getElementById("lineup_red3_C").checked) RC++;
	if (document.getElementById("lineup_red4_C").checked) RC++;
	if (document.getElementById("lineup_red5_C").checked) RC++;
	if (document.getElementById("lineup_red1_CC").checked) RCC++;
	if (document.getElementById("lineup_red2_CC").checked) RCC++;
	if (document.getElementById("lineup_red3_CC").checked) RCC++;
	if (document.getElementById("lineup_red4_CC").checked) RCC++;
	if (document.getElementById("lineup_red5_CC").checked) RCC++;

	if (form_array["lineup_yellow1_C"].checked) YC++;
	if (form_array["lineup_yellow2_C"].checked) YC++;
	if (form_array["lineup_yellow3_C"].checked) YC++;
	if (form_array["lineup_yellow4_C"].checked) YC++;
	if (form_array["lineup_yellow5_C"].checked) YC++;
	if (form_array["lineup_yellow1_CC"].checked) YCC++;
	if (form_array["lineup_yellow2_CC"].checked) YCC++;
	if (form_array["lineup_yellow3_CC"].checked) YCC++;
	if (form_array["lineup_yellow4_CC"].checked) YCC++;
	if (form_array["lineup_yellow5_CC"].checked) YCC++;

	if (form_array["lineup_green1_C"].checked) GC++;
	if (form_array["lineup_green2_C"].checked) GC++;
	if (form_array["lineup_green3_C"].checked) GC++;
	if (form_array["lineup_green4_C"].checked) GC++;
	if (form_array["lineup_green5_C"].checked) GC++;
	if (form_array["lineup_green1_CC"].checked) GCC++;
	if (form_array["lineup_green2_CC"].checked) GCC++;
	if (form_array["lineup_green3_CC"].checked) GCC++;
	if (form_array["lineup_green4_CC"].checked) GCC++;
	if (form_array["lineup_green5_CC"].checked) GCC++;

	if (RC !== 1) {alert("Red team must have exactly one captain"); return false;}
	if (RCC != 1) {alert("Red team must have exactly one co-captain"); return false;}
	if (YC != 1) {alert("Yellow team must have exactly one captain"); return false;}
	if (YCC != 1) {alert("Yellow team must have exactly one co-captain"); return false;}
	if (GC != 1) {alert("Green team must have exactly one captain"); return false;}
	if (GCC != 1) {alert("Green team must have exactly one co-captain"); return false;}

	lineups_menu.style.display = "none";
	return false;
}

</script>

</body>
</html>