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

/* State variables. They are initialized with default values to start but can be
changed later. */

// Teams
var red = 1;
var yellow = 1;
var green = 1;

// Team names
var red_name = "Red Team";
var yellow_name = "Yellow Team";
var green_name = "Green Team";

// Is the fifth person used?
var fifth_person_used = false;

// Position of captains and co-captains
var red_C = 1;
var red_CC = 2;
var yellow_C = 1;
var yellow_CC = 2;
var green_C = 1;
var greenCC = 2;

// Names of each team member (empty string signifies no quizzer in that seat)
var red_team = ["", "", "", "Red 4", "Red 5"];
var yellow_team = ["Yellow 1", "Yellow 2", "Yellow 3", "Yellow 4", ""];
var green_team = ["Green 1", "Green 2", "", "Green 4", "Green 5"];

// Has everything been setup?
var is_setup = false;

load_quiz();

/*
 * Creates the quiz based on the state variables.
 */
function load_quiz() {
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller_get_quiz_teams_UI.php?red=" + red + "&yellow=" + yellow + "&green=" + green, true);
	ajax.send();

	ajax.onreadystatechange= function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			// Team's inner HTML
			document.getElementById("teams_ajax").innerHTML = JSON.parse(ajax.responseText);

			// Fill in names
			if (red == 1) {
				document.getElementById("team_red_score_top").innerHTML = red_name;
				for (var i = 1; i <= 5; i++) {
					document.getElementById("red" + i + "_name").innerHTML = red_team[i - 1];
					if (red_team[i - 1] == "") {
						document.getElementById("red" + i).style.opacity = 0;
						// FIXME: remove event listener
					}
					else {
						document.getElementById("red" + i).style.opacity = 1;
						// FIXME: add event listener
					}
				}
				if (fifth_person_used == false && red_team[4] != "") {
					document.getElementById("red5_light").style.opacity = 0;
					// FIXME: remove event listener
				}
			}
			if (yellow == 1) {
				document.getElementById("team_yellow_score_top").innerHTML = yellow_name;
				for (var i = 1; i <= 5; i++) {
					document.getElementById("yellow" + i + "_name").innerHTML = yellow_team[i - 1];
					if (yellow_team[i - 1] == "") {
						document.getElementById("yellow" + i).style.opacity = 0;
						// FIXME: remove event listener
					}
					else {
						document.getElementById("yellow" + i).style.opacity = 1;
						// FIXME: add event listener
					}
				}
				if (fifth_person_used == false && yellow_team[4] != "") {
					document.getElementById("yellow5_light").style.opacity = 0;
					// FIXME: remove event listener
				}
			}
			if (green == 1) {
				document.getElementById("team_green_score_top").innerHTML = green_name;
				for (var i = 1; i <= 5; i++) {
					document.getElementById("green" + i + "_name").innerHTML = green_team[i - 1];
					if (green_team[i - 1] == "") {
						document.getElementById("green" + i).style.opacity = 0;
						// FIXME: remove event listener
					}
					else {
						document.getElementById("green" + i).style.opacity = 1;
						// FIXME: add event listener
					}
				}
				if (fifth_person_used == false && green_team[4] != "") {
					document.getElementById("green5_light").style.opacity = 0;
					// FIXME: remove event listener
				}
			}

			// This is here because the first quiz must be loaded before everything else is setup
			if (is_setup == false) {
				setup();
			}
		}
	}
}

function setup() {
	// Lineups menu setup
	document.getElementById("lineups_button").addEventListener("click", lineups);
	document.getElementById("lineups_form").onsubmit = handle_lineups;
	document.getElementById("lineups_cancel").addEventListener("click", handle_lineups_cancel);

	setup = true;
}

function lineups() {
	lineups_menu.style.display = "block";
}

function handle_lineups_cancel() {
	lineups_menu.style.display = "none";
	return false;
}

/**
 * Returns true if the checkboxes are checked properly, false otherwise.
 * Also alerts the user if the checkboxes are not checked properly.
 */
function check_checkboxes() {
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

	if (document.getElementById("lineup_yellow1_C").checked) YC++;
	if (document.getElementById("lineup_yellow2_C").checked) YC++;
	if (document.getElementById("lineup_yellow3_C").checked) YC++;
	if (document.getElementById("lineup_yellow4_C").checked) YC++;
	if (document.getElementById("lineup_yellow5_C").checked) YC++;
	if (document.getElementById("lineup_yellow1_CC").checked) YCC++;
	if (document.getElementById("lineup_yellow2_CC").checked) YCC++;
	if (document.getElementById("lineup_yellow3_CC").checked) YCC++;
	if (document.getElementById("lineup_yellow4_CC").checked) YCC++;
	if (document.getElementById("lineup_yellow5_CC").checked) YCC++;

	if (document.getElementById("lineup_green1_C").checked) GC++;
	if (document.getElementById("lineup_green2_C").checked) GC++;
	if (document.getElementById("lineup_green3_C").checked) GC++;
	if (document.getElementById("lineup_green4_C").checked) GC++;
	if (document.getElementById("lineup_green5_C").checked) GC++;
	if (document.getElementById("lineup_green1_CC").checked) GCC++;
	if (document.getElementById("lineup_green2_CC").checked) GCC++;
	if (document.getElementById("lineup_green3_CC").checked) GCC++;
	if (document.getElementById("lineup_green4_CC").checked) GCC++;
	if (document.getElementById("lineup_green5_CC").checked) GCC++;

	if (RC !== 1) {alert("Red team must have exactly one captain"); return false;}
	if (RCC != 1) {alert("Red team must have exactly one co-captain"); return false;}
	if (YC != 1) {alert("Yellow team must have exactly one captain"); return false;}
	if (YCC != 1) {alert("Yellow team must have exactly one co-captain"); return false;}
	if (GC != 1) {alert("Green team must have exactly one captain"); return false;}
	if (GCC != 1) {alert("Green team must have exactly one co-captain"); return false;}

	return true;
}

function handle_lineups() {
	var form_array = document.forms["lineups_form"];

	if (check_checkboxes() == false) {
		return false;
	}

	lineups_menu.style.display = "none";
	return false;
}

</script>

</body>
</html>