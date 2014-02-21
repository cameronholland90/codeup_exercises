<?php

function get_input($upper = FALSE) 
{
    $userInput = trim(fgets(STDIN));
    if ($upper === TRUE) {
        return strtoupper($userInput);
    } else {
        return $userInput;
    }

    // Return filtered STDIN input
}

// preforms first roll and reroll for dice selected by user
function rollDice(&$dice, &$diceToReroll) {
	for ($i = 0; $i < count($diceToReroll); $i++) { 
		$temp = $diceToReroll[$i] - 1;
		$dice[$temp] = mt_rand(1, 6);
	}
	$diceToReroll = array();
}

// shows the players dice
function displayDice($dice) {
	$tempString = '';
	foreach ($dice as $value) {
		$tempString .= $value . " ";
	}
	echo "Dice: " . $tempString . "\n";
}

// checks the dice to see what score category they fit in
function typeOfHand($dice,  &$scores) {
	$userOptions = array();
	$valueCount = array(0, 0, 0, 0, 0, 0);
	$tempScore = 0;

	// counts how many dice are at each value
	$valueCount[0] = count(array_keys($dice, 1));
	$valueCount[1] = count(array_keys($dice, 2));
	$valueCount[2] = count(array_keys($dice, 3));
	$valueCount[3] = count(array_keys($dice, 4));
	$valueCount[4] = count(array_keys($dice, 5));
	$valueCount[5] = count(array_keys($dice, 6));
	$tempScore = array_sum($dice);

	// based on how many of each value you have, $userOptions gets each category your dice qualify for
	if (in_array(5, $valueCount)) {
		$userOptions[] = "Yahtzee";
		$scores[] = 50;
	} 
	if (in_array(4, $valueCount)) {
		$userOptions[] = "Four of a Kind";
		$scores[] = $tempScore;
	} 
	if (in_array(3, $valueCount) && in_array(2, $valueCount)) {
		$userOptions[] = "Full House";
		$scores[] = 25;
	} 
	if (in_array(3, $valueCount)) {
		$userOptions[] = "Three of a Kind";
		$scores[] = $tempScore;
	} 
	if ((array_search(0, $valueCount) === 0 || array_search(0, $valueCount) === 5) && (count(array_keys($valueCount, 0)) === 1)) {
		$userOptions[] = "Large Straight";
		$scores[] = 40;
	}
	if ((array_search(0, $valueCount) === 4 && array_search(0, $valueCount) === 5) || 
		(array_search(0, $valueCount) === 0 && array_search(0, $valueCount) === 5) || 
		(array_search(0, $valueCount) === 0 && array_search(0, $valueCount) === 1)) {
		$userOptions[] = "Small Straight";
		$scores[] = 30;
	}
	$userOptions[] = "Chance";
	$scores[] = $tempScore;

	// if ($one === 5 || $two === 5 || $three === 5 || $four === 5 || $five === 5 || $six === 5) {
	// 	$userOptions[] = "Yahtzee";
	// 	$scores[] = 50;
	// } 
	// if ($one === 4 || $two === 4 || $three === 4 || $four === 4 || $five === 4 || $six === 4) {
	// 	$userOptions[] = "Four of a Kind";
	// 	$scores[] = $tempScore;
	// } 
	// if (($one === 3 || $two === 3 || $three === 3 || $four === 3 || $five === 3 || $six === 3) && 
	// 			($one === 2 || $two === 2 || $three === 2 || $four === 2 || $five === 2 || $six === 2)) {
	// 	$userOptions[] = "Full House";
	// 	$scores[] = 25;
	// } 
	// if ($one === 3 || $two === 3 || $three === 3 || $four === 3 || $five === 3 || $six === 3) {
	// 	$userOptions[] = "Three of a Kind";
	// 	$scores[] = $tempScore;
	// } 
	// if (($one === 1 && $two === 1 && $three === 1 && $four === 1 && $five === 1) || 
	// 			($two === 1 && $three === 1 && $four === 1 && $five === 1 && $six === 1)){
	// 	$userOptions[] = "Large Straight";
	// 	$scores[] = 40;
	// } 
	// if (($one >= 1 && $two >= 1 && $three >= 1 && $four >= 1) || 
	// 			($two >= 1 && $three >= 1 && $four >= 1 && $five >= 1) || 
	// 			($three >= 1 && $four >= 1 && $five >= 1 && $six >= 1)){
	// 	$userOptions[] = "Small Straight";
	// 	$scores[] = 30;
	// } 

	
	return $userOptions;
}

function listOptions($userOptions, $scores) {
    $output = "";
    // Iterate through list items
    foreach ($userOptions as $key => $option) {
        // Display each item and a newline
        $key2 = $key + 1;
        $output .= "[{$key2}] {$option} for " . $scores[$key] . "\n";
    }

    return $output;
}

function pickOption(&$userOptions, &$scores) {
	echo "Which way would you like to score your dice? ";
	$input = (get_input() - 1);
	$userOptions = $userOptions[$input];
	$scores = $scores[$input];
}


$dice = array(0, 0, 0, 0, 0);	// array that holds face values of dice
$diceToReroll = array(1,2,3,4,5);		// array that will hold index of dice to reroll each turn
$rollcount = 1;					// keeps track of how many times the user has rolled(3 is maximum including initial roll)
$score = 0;						// keeps track of score
$userOptions = array();			// holds score options for user at end of turn

rollDice($dice, $diceToReroll);
displayDice($dice);

// asks user if they would like to reroll some of their dice
echo "Would you like to reroll some of your dice? ";
$answer = get_input(TRUE);
while($answer === 'Y' && $rollcount < 3) {
	$rollcount++;
	// prints out values again
	displayDice($dice);

	// asks which ones to reroll
	echo "Which dice would you like to reroll ex: 1, 3, 4? ";
	$diceReroll = get_input();
	$diceReroll = explode(', ', $diceReroll);

	rollDice($dice, $diceReroll);
	displayDice($dice);

	if ($rollcount < 3) {			// checks to see how many times the user has rolled their dice
		// asks if you would like to reroll again
		echo "Would you like to reroll again? ";
		$answer = get_input(TRUE);	
	} else {
		// tells the user they have rolled 3 times and ends the game loop
		echo "You have rolled 3 times. Your turn is done!\n";
		$answer = "done";
	}
}

asort($dice);										// sorts the dice into value order after the users turn
displayDice($dice);									// displays sorted dice
$userOptions = typeOfHand($dice, $scores);			// checks to see what score options the user has

echo listOptions($userOptions, $scores);			// lists options for user to score

pickOption($userOptions, $scores);

echo "You had a {$userOptions} with a score of {$scores}!\n";

?>