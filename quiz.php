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

<!-- TEAMS -->

<div id="teams_ajax" class="plain_div"></div>

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
		<form id="lineups_form" autocomplete="off">
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
			<div class="lineups_label">5th person on?</div>
			<input type="checkbox" id="fifth_person_on">
		</form>
	</div>
</div>

<datalist id="lineup_list_red">
	<option value="(No Quizzer)">
</datalist>
<datalist id="lineup_list_yellow">
	<option value="(No Quizzer)">
</datalist>
<datalist id="lineup_list_green">
	<option value="(No Quizzer)">
</datalist>

<datalist id="team_list">
	<option value="(No Team)">
</datalist>

<script src="quiz.js" type="module"></script>

</body>
</html>