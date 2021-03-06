import {get_teams_html} from "./quiz_get_teams_html.js";

/* State variables. They are initialized with default values to start but can be
changed later. */

// Teams
var red = 1;
var yellow = 0;
var green = 1;

// Team names
var red_name = "Red Team";
var yellow_name = "(No Team)";
var green_name = "Green Team";

// Is the fifth person used?
var fifth_person_used = false;

// Position of captains and co-captains
var red_C = 1;
var red_CC = 2;
var yellow_C = 1;
var yellow_CC = 2;
var green_C = 1;
var green_CC = 2;

// Names of each team member (empty string signifies no quizzer in that seat)
var red_team = ["Red 1", "Red 2", "Red 3", "Red 4", "Red 5"];
var yellow_team = ["Yellow 1", "Yellow 2", "Yellow 3", "Yellow 4", ""];
var green_team = ["Green 1", "Green 2", "Green 3", "Green 4", "Green 5"];

// Has everything been setup?
var is_setup = false;

/* Other (non-state) global variables. */

// Map for temporay values
var temp_map = new Map();

// Maps team names to quizzers on that team
var team_map = new Map();
team_map.set("(No Team)", []);

load_quiz();

/*
 * Creates the quiz based on the state variables.
 */
function load_quiz() {
	document.getElementById("teams_ajax").innerHTML = get_teams_html(red, yellow, green);
	
	// Fill in names
	if (red == 1) {
		document.getElementById("team_red_score_top").innerHTML = red_name;
		for (var i = 1; i <= 5; i++) {
			document.getElementById("red" + i + "_name").innerHTML = red_team[i - 1];
			if (red_team[i - 1] == ""  || red_team[i - 1] == "(No Quizzer)") {
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

/**
 * Setup the initial default screen. This should be called ONLY when the page is first loaded
 * and called within load_quiz() at the very end of the function.
 */
function setup() {
	// Lineups menu setup
	document.getElementById("lineups_button").addEventListener("click", lineups);
	document.getElementById("lineups_form").onsubmit = handle_lineups;
	document.getElementById("lineups_cancel").addEventListener("click", handle_lineups_cancel);
	
	set_mouse_action("lineup_red_teamname");
	set_mouse_action("lineup_yellow_teamname")
	set_mouse_action("lineup_green_teamname");
	
	for (var i = 1; i <= 5; i++) {
		set_mouse_action("lineup_red" + i);
		set_mouse_action("lineup_yellow" + i);
		set_mouse_action("lineup_green" + i);
	}

	is_setup = true;
}

/**
 * This should be called within setup() for each necessary element:
 * This function should only be used on <input> elements with datalists attached.
 * It allows the input to have a value, but the user is still able to see the
 * dropdown when they hover over the input.
 * Additionally, any elements with "teamname" in the id are programmed to call
 * populate_lineup_dropdowns() on the mouseleave event.
 */
function set_mouse_action(element_id) {
	var element = document.getElementById(element_id);
	var typing = false;
	
	element.onmouseover = function() {
		temp_map.set(element_id, element.value);
		element.value = "";
	}
	
	element.onmouseleave = function() {
		if (typing == true) {
			typing = false;
		}
		else {
			element.value = temp_map.get(element_id);
		}
	}
	
	if (element_id.includes("teamname")) {
		element.oninput = function() {
			typing = true;
			populate_lineup_dropdowns(element_id);
		}
	}
	else {
		element.oninput = function() {
			typing = true;
		}
	}
}

/**
 * This function populates the team quizzers datalist ("lineup_list_(team)")
 * based on the current value of the passed in element id. If the value of
 * the element matches a given team, the dropdowns include all used quizzers.
 * If not, then the dropdown just contains (No Quizzer).
 */
function populate_lineup_dropdowns(team_element_id) {
	var datalist = '<option value="(No Quizzer)">';
	var element = document.getElementById(team_element_id);
	
	// Update if the team exists
	if (team_map.has(element.value)) {
		var team = team_map.get(element.value);
		for (var i = 0; i < team.length; i++) {
			datalist += '<option value="' + team[i] + '">';
		}
	}
	
	// Update the correct datalist
	if (team_element_id.includes("red")) {
		document.getElementById("lineup_list_red").innerHTML = datalist;
	}
	else if (team_element_id.includes("yellow")) {
		document.getElementById("lineup_list_yellow").innerHTML = datalist;
	}
	else if (team_element_id.includes("green")) {
		document.getElementById("lineup_list_green").innerHTML = datalist;
	}
}

/**
 * Sets up the lineups menu by filling in all relevant info and setting the
 * display type to block (instead of none).
 */
function lineups() {
	// Before diaplaying menu, fill in boxes with relevant info
	document.getElementById("lineup_red_teamname").value = red_name;
	document.getElementById("lineup_yellow_teamname").value = yellow_name;
	document.getElementById("lineup_green_teamname").value = green_name;
	
	for (var i = 1; i <= 5; i++) {
		document.getElementById("lineup_red" + i).value = red_team[i - 1];
		document.getElementById("lineup_yellow" + i).value = yellow_team[i - 1];
		document.getElementById("lineup_green" + i).value = green_team[i - 1];
	}
	
	populate_lineup_dropdowns("lineup_red_teamname");
	populate_lineup_dropdowns("lineup_yellow_teamname");
	populate_lineup_dropdowns("lineup_green_teamname");

	// Display menu
	lineups_menu.style.display = "block";
}

/**
 * Handles the event that the "cancel" button is pressed on the lineups menu.
 */
function handle_lineups_cancel() {
	lineups_menu.style.display = "none";
	return false;
}

/**
 * Returns true if the lineups checkboxes are checked properly, false otherwise.
 * Also alerts the user if the checkboxes are not checked properly.
 */
function check_checkboxes() {
	// Can't use the state variables red, green, yellow since this function is called before those are set
	if (document.getElementById("lineup_red_teamname").value != "" &&
			document.getElementById("lineup_red_teamname").value != "(No Team)") {
		var RC=0; var RCC=0;
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

		if (RC !== 1) {alert("Red team must have exactly one captain"); return false;}
		if (RCC != 1) {alert("Red team must have exactly one co-captain"); return false;}
	}

	if (document.getElementById("lineup_yellow_teamname").value != "" &&
			document.getElementById("lineup_yellow_teamname").value != "(No Team)") {
		var YC=0; var YCC=0;
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

		if (YC != 1) {alert("Yellow team must have exactly one captain"); return false;}
		if (YCC != 1) {alert("Yellow team must have exactly one co-captain"); return false;}
	}

	if (document.getElementById("lineup_green_teamname").value != "" &&
			document.getElementById("lineup_green_teamname").value != "(No Team)") {
		var GC=0; var GCC=0;
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

		if (GC != 1) {alert("Green team must have exactly one captain"); return false;}
		if (GCC != 1) {alert("Green team must have exactly one co-captain"); return false;}
	}
	
	if (document.getElementById("fifth_person_on").checked) {
		fifth_person_used = true;
	}
	else {
		fifth_person_used = false;
	}
	
	return true;
}

/**
 * Adds the given team to the team map variable.
 */
function add_team(team_name) {
	// Don't need to add the team if it's already added
	if (team_map.has(team_name) == false) {
		team_map.set(team_name, []);
		document.getElementById("team_list").innerHTML += '<option value="' + team_name + '">';
	}
}

/**
 * Add the given quizzer to the given team's quizzer list, if the team exists in the team map.
 */
function add_quizzer(quizzer_name, team_name) {
	// Only add the quizzer if the team exists and the quizzer isn't on the team yet
	if (team_map.has(team_name) == true) {
		var team = team_map.get(team_name);
		if (team.includes(quizzer_name) == false) {
			team.push(quizzer_name);
		}
	}
	// Don't change the HTML of the lineups menu here; that happens in the team name
	// event listener (oninput, see set_mouse_events()).
}

/**
 * Handles the event that the quizzer presses "OK" on the lineups menu (i.e. submits the form).
 */
function handle_lineups() {
	// Check checkboxes, do nothing if it fails (the function handles alerting the user)
	if (check_checkboxes() == false) {
		return false;
	}

	// Set the state variables and load the quiz
	// Team names
    red_name = document.getElementById("lineup_red_teamname").value;
    yellow_name = document.getElementById("lineup_yellow_teamname").value;
    green_name = document.getElementById("lineup_green_teamname").value;
	add_team(red_name);
	add_team(yellow_name);
	add_team(green_name);
	
	// Teams
	if (red_name != "" && red_name != "(No Team)") red = 1;
	else red = 0;
	if (yellow_name != "" && yellow_name != "(No Team)") yellow = 1;
	else yellow = 0;
	if (green_name != "" && green_name != "(No Team)") green = 1;
	else green = 0;
    
    // Is the fifth person used? FIXME
    //fifth_person_used = false;
    
    // Position of captains and co-captains
    red_C = -1; // Default value if there is no captain
    for (var i = 1; i <= 5; i++) {
		if (document.getElementById("lineup_red" + i + "_C").checked) {
			red_C = i;
			break;
		}
    }
    red_CC = -1; // Default value if there is no captain
    for (var i = 1; i <= 5; i++) {
		if (document.getElementById("lineup_red" + i + "_CC").checked) {
			red_CC = i;
			break;
		}
    }
    yellow_C = -1; // Default value if there is no captain
    for (var i = 1; i <= 5; i++) {
		if (document.getElementById("lineup_yellow" + i + "_C").checked) {
			yellow_C = i;
			break;
		}
    }
    yellow_CC = -1; // Default value if there is no captain
    for (var i = 1; i <= 5; i++) {
		if (document.getElementById("lineup_yellow" + i + "_CC").checked) {
			yellow_CC = i;
			break;
		}
    }
    green_C = -1; // Default value if there is no captain
    for (var i = 1; i <= 5; i++) {
		if (document.getElementById("lineup_green" + i + "_C").checked) {
			green_C = i;
			break;
		}
    }
    green_CC = -1; // Default value if there is no captain
    for (var i = 1; i <= 5; i++) {
		if (document.getElementById("lineup_green" + i + "_CC").checked) {
			green_CC = i;
			break;
		}
    }
    
    // Names of each team member
    for (var i = 1; i <= 5; i++) {
		red_team[i-1] = document.getElementById("lineup_red" + i).value;
		add_quizzer(red_team[i-1], red_name);
		yellow_team[i-1] = document.getElementById("lineup_yellow" + i).value;
		add_quizzer(yellow_team[i-1], yellow_name);
		green_team[i-1] = document.getElementById("lineup_green" + i).value;
		add_quizzer(green_team[i-1], green_name);
    }
	
	lineups_menu.style.display = "none";
	load_quiz();
	
	return false;
}