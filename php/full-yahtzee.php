<?php

function get_input($upper = FALSE) 
{
    $userInput = trim(fgets(STDIN));
    if ($upper === TRUE) {
        return strtoupper($userInput);
    } else {
        return $userInput;
    }
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
function typeOfHand($dice, &$scores, $remainingOptions) {
	$userOptions = array();
	$scores = array();
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
	if (in_array(5, $valueCount) ) {
		$userOptions[] = "Yahtzee";
		$scores[] = 50;
	} 
	if (in_array(4, $valueCount) && in_array("Four of a Kind", $remainingOptions)) {
		$userOptions[] = "Four of a Kind";
		$scores[] = $tempScore;
	} 
	if ((in_array(3, $valueCount) && in_array(2, $valueCount)) && in_array("Full House", $remainingOptions)) {
		$userOptions[] = "Full House";
		$scores[] = 25;
	} 
	if (in_array(3, $valueCount) && in_array("Three of a Kind", $remainingOptions)) {
		$userOptions[] = "Three of a Kind";
		$scores[] = $tempScore;
	} 
	if (((array_search(0, $valueCount) === 0 || array_search(0, $valueCount) === 5) && (count(array_keys($valueCount, 0)) === 1)) 
		&& in_array("Large Straight", $remainingOptions)) {
		$userOptions[] = "Large Straight";
		$scores[] = 40;
	}

	if ((($valueCount[0] >= 1 && $valueCount[1] >= 1 && $valueCount[2] >= 1 && $valueCount[3] >= 1) || 
			($valueCount[1] >= 1 && $valueCount[2] >= 1 && $valueCount[3] >= 1 && $valueCount[4] >= 1) || 
			($valueCount[2] >= 1 && $valueCount[3] >= 1 && $valueCount[4] >= 1 && $valueCount[5] >= 1))
			&& in_array("Small Straight", $remainingOptions)) {
		$userOptions[] = "Small Straight";
		$scores[] = 30;
	}
	if (in_array("Chance", $remainingOptions)) {
		$userOptions[] = "Chance";
		$scores[] = $tempScore;
	}
	
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

$continue = TRUE;
$dice = array(0, 0, 0, 0, 0);			// array that holds face values of dice
$diceToReroll = array(1,2,3,4,5);		// array that will hold index of dice to reroll each turn
$rollcount;								// keeps track of how many times the user has rolled(3 is maximum including initial roll)
$score = 0;								// keeps track of score
$userOptions = array();					// holds score options for user at end of turn
$remainingOptions = array("Yahtzee", "Four of a Kind", "Full House", "Three of a Kind", "Large Straight", "Small Straight", 
"Chance");

while($continue) {
	$dice = array(0, 0, 0, 0, 0);	
	$diceToReroll = array(1,2,3,4,5);
	rollDice($dice, $diceToReroll);
	$rollcount = 1;
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
		$diceReroll = explode(',', $diceReroll);

		foreach ($diceReroll as $key => $value) {
			$diceReroll[$key] = trim($value);
		}

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

	asort($dice);															// sorts the dice into value order after the users turn
	displayDice($dice);														// displays sorted dice
	$userOptions = typeOfHand($dice, $scores, $remainingOptions);			// checks to see what score options the user has

	if (empty($userOptions)) {
		$userOptions = $remainingOptions;
		$scores = array();
		for ($i=0; $i < count($userOptions); $i++) { 
			$scores[] = 0;
		}
	}

	echo listOptions($userOptions, $scores);								// lists options for user to score

	pickOption($userOptions, $scores);										// allows user to pick how to score their turn

	$choice = array_search($userOptions, $remainingOptions);				// finds where the user's choice is in the $remainingOptions array
	unset($remainingOptions[$choice]);										// removes the users choice from the available choices
	$remainingOptions = array_values($remainingOptions);
	$score += $scores;														// adds the users score from the turn to their total score

	echo "You had a {$userOptions} with a score of {$scores}!\n";			// displays the users choice for the round and how much they scored that turn

	if (empty($remainingOptions)) {
		$continue = FALSE;
	}
}

echo "Your final score was {$score}!\n";

?>