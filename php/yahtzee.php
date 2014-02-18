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

function firstDiceRoll(&$dice) {
	foreach ($dice as $die => $value) {
		$dice[$die] = mt_rand(1, 6);
	}
}

function displayDice($dice) {
	$tempString = '';
	foreach ($dice as $value) {
		$tempString .= $value . " ";
	}
	echo "Dice: " . $tempString . "\n";
}

function rerollDice(&$dice, &$diceToReroll) {
	for ($i = 0; $i < count($diceToReroll); $i++) { 
		$temp = $diceToReroll[$i] - 1;
		$dice[$temp] = mt_rand(1, 6);
	}
	$diceToReroll = array();
}

function typeOfHand($dice, &$score) {
	$one = 0;
	$two = 0;
	$three = 0;
	$four = 0;
	$five = 0;
	$six = 0;
	$tempScore = 0;
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
	if ($one === 5 || $two === 5 || $three === 5 || $four === 5 || $five === 5 || $six === 5) {
		$score = 50;
		return "Yahtzee!";
	} elseif ($one === 4 || $two === 4 || $three === 4 || $four === 4 || $five === 4 || $six === 4) {
		$score = $tempScore;
		return "Four of a Kind!";
	} elseif (($one === 3 || $two === 3 || $three === 3 || $four === 3 || $five === 3 || $six === 3) && 
				($one === 2 || $two === 2 || $three === 2 || $four === 2 || $five === 2 || $six === 2)) {
		$score = 25;
		return "Full House!";
	} elseif ($one === 3 || $two === 3 || $three === 3 || $four === 3 || $five === 3 || $six === 3) {
		$score = $tempScore;
		return "Three of a Kind!";
	} elseif (($one === 1 && $two === 1 && $three === 1 && $four === 1 && $five === 1) || 
				($two === 1 && $three === 1 && $four === 1 && $five === 1 && $six === 1)){
		$score = 40;
		return "Large Straight!";
	} elseif (($one === 1 && $two === 1 && $three === 1 && $four === 1) || 
				($two === 1 && $three === 1 && $four === 1 && $five === 1) || 
				($three === 1 && $four === 1 && $five === 1 && $six === 1)){
		$score = 30;
		return "Small Straight!";
	} else {
		$score = $tempScore;
		return "Chance!";
	}
}

// array that holds face values of dice
$dice = array(0, 0, 0, 0, 0);
$diceToReroll = array();
$rollcount = 1;
$score = 0;

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
	echo "How many would you like to reroll? ";
	$number = get_input();
	for ($i = 0; $i < $number; $i++) {
		echo "Which die would you like to reroll? "; 
		$diceToReroll[$i] = get_input();
	}

	rerollDice($dice, $diceToReroll);
	displayDice($dice);

	echo "Would you like to reroll again? ";
	$answer = get_input(TRUE);

	if ($rollcount === 3 && $answer === 'Y') {
		echo "You can not reroll again!\n";
	}
}

asort($dice);
displayDice($dice);
$type = typeOfHand($dice, $score);

echo "You had a {$type} with a score of {$score}!\n";

?>