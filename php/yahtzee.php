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

// preforms the initial dice roll
function firstDiceRoll(&$dice) {
	foreach ($dice as $die => $value) {
		$dice[$die] = mt_rand(1, 6);
	}
}

// shows the players dice
function displayDice($dice) {
	$tempString = '';
	foreach ($dice as $value) {
		$tempString .= $value . " ";
	}
	echo "Dice: " . $tempString . "\n";
}

// preforms reroll for dice selected by user
function rerollDice(&$dice, &$diceToReroll) {
	for ($i = 0; $i < count($diceToReroll); $i++) { 
		$temp = $diceToReroll[$i] - 1;
		$dice[$temp] = mt_rand(1, 6);
	}
	$diceToReroll = array();
}

// checks the dice to see what score category they fit in
function typeOfHand($dice, &$userOptions, &$scores) {
	$one = 0;
	$two = 0;
	$three = 0;
	$four = 0;
	$five = 0;
	$six = 0;
	$tempScore = 0;

	// counts how many dice are at each value
	foreach ($dice as $key => $value) {
		if ($value === 1) {
			$one++;
		} elseif ($value === 2) {
			$two++;
		} elseif ($value === 3) {
			$three++;
		} elseif ($value === 4) {
			$four++;
		} elseif ($value === 5) {
			$five++;
		} elseif ($value === 6) {
			$six++;
		}
		$tempScore += $value;
	}

	// based on how many of each value you have, $userOptions gets each category your dice qualify for
	if ($one === 5 || $two === 5 || $three === 5 || $four === 5 || $five === 5 || $six === 5) {
		$userOptions[] = "Yahtzee";
		$scores[] = 50;
	} 
	if ($one === 4 || $two === 4 || $three === 4 || $four === 4 || $five === 4 || $six === 4) {
		$userOptions[] = "Four of a Kind";
		$scores[] = $tempScore;
	} 
	if (($one === 3 || $two === 3 || $three === 3 || $four === 3 || $five === 3 || $six === 3) && 
				($one === 2 || $two === 2 || $three === 2 || $four === 2 || $five === 2 || $six === 2)) {
		$userOptions[] = "Full House";
		$scores[] = 25;
	} 
	if ($one === 3 || $two === 3 || $three === 3 || $four === 3 || $five === 3 || $six === 3) {
		$userOptions[] = "Three of a Kind";
		$scores[] = $tempScore;
	} 
	if (($one === 1 && $two === 1 && $three === 1 && $four === 1 && $five === 1) || 
				($two === 1 && $three === 1 && $four === 1 && $five === 1 && $six === 1)){
		$userOptions[] = "Large Straight";
		$scores[] = 40;
	} 
	if (($one >= 1 && $two >= 1 && $three >= 1 && $four >= 1) || 
				($two >= 1 && $three >= 1 && $four >= 1 && $five >= 1) || 
				($three >= 1 && $four >= 1 && $five >= 1 && $six >= 1)){
		$userOptions[] = "Small Straight";
		$scores[] = 30;
	} 
	$userOptions[] = "Chance";
	$scores[] = $tempScore;
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
$diceToReroll = array();		// array that will hold index of dice to reroll each turn
$rollcount = 1;					// keeps track of how many times the user has rolled(3 is maximum including initial roll)
$score = 0;						// keeps track of score
$userOptions = array();			// holds score options for user at end of turn

firstDiceRoll($dice);
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

	rerollDice($dice, $diceReroll);
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
typeOfHand($dice, $userOptions, $scores);			// checks to see what score options the user has

echo listOptions($userOptions, $scores);			// lists options for user to score

pickOption($userOptions, $scores);

echo "You had a {$userOptions} with a score of {$scores}!\n";

?>