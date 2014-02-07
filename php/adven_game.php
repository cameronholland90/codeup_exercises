<?php

//variables
$continue = TRUE;
$playAgain = '';
$firstMove = TRUE;
$move = '';
$myX = 0;
$myY = 0;
$lastMove = array($myX, $myY);
$win_cords = array(rand(1,4), rand(1,4));
$lose_cords = array(rand(1,4), rand(1,4));
$displayBoard = array(array('.', '.', '.', '.', '.'), 
					  array('.', '.', '.', '.', '.'), 
					  array('.', '.', '.', '.', '.'), 
					  array('.', '.', '.', '.', '.'), 
					  array('.', '.', '.', '.', '.'));

$locationBoard = array(array('.', '.', '.', '.', '.'), 
					   array('.', '.', '.', '.', '.'), 
					   array('.', '.', '.', '.', '.'), 
					   array('.', '.', '.', '.', '.'), 
					   array('.', '.', '.', '.', '.'));


//set up locations on board
$locationBoard[$win_cords[0]][$win_cords[1]] = 'w';
$locationBoard[$lose_cords[0]][$lose_cords[1]] = 'l';


//display board / play game
while($continue) {
	//sets your location
	$locationBoard[$myX][$myY] = 'o';
	$displayBoard[$myX][$myY] = 'o';
	//print board
	for($i = 4; $i >= 0; $i--) {
		for($j = 0; $j < 5; $j++) {
			echo $displayBoard[$j][$i] . "\t";
		}
		echo "\n";
	}
	
	//print out control options
	echo "a = left, w = up, s = down, d = right\n";

	//ask users next move and execute
	if($firstMove === TRUE){
		//ask user for first move
		fwrite(STDOUT, "First Move?\n");
		$move = fgets(STDIN);

		//do user input move
		if($move == "a\n" && $myX != 0) {
			$myX--;
		} elseif ($move == "w\n" && $myY != 4) {
			$myY++;
		} elseif ($move == "s\n" && $myY != 0) {
			$myY--;
		} elseif ($move == "d\n" && $myX != 4) {
			$myX++;
		} else {
			echo "You cant move there!\n";
		}

		//not users first move
		$firstMove = FALSE;
	} else {
		//ask user next move
		fwrite(STDOUT, "Next Move?\n");
		$move = fgets(STDIN);

		//do user input move
		if($move == "a\n" && $myX != 0) {
			$myX--;
		} elseif ($move == "w\n" && $myY != 4) {
			$myY++;
		} elseif ($move == "s\n" && $myY != 0) {
			$myY--;
		} elseif ($move == "d\n" && $myX != 4) {
			$myX++;
		} else {
			echo "You cant move there!\n";
		}

		//check if user won, lost or ask next move
		if($locationBoard[$myX][$myY] === 'w') {
			echo "You Win!";
			fwrite(STDOUT, "Play Again?\n");
			$playAgain = fgets(STDIN);
			if($playAgain = "yes" || $playAgain = 'y') {
				$displayBoard = array(array('.', '.', '.', '.', '.'), 
					  				  array('.', '.', '.', '.', '.'), 
					  				  array('.', '.', '.', '.', '.'), 
									  array('.', '.', '.', '.', '.'), 
									  array('.', '.', '.', '.', '.'));
				$locationBoard = array(array('.', '.', '.', '.', '.'), 
									   array('.', '.', '.', '.', '.'), 
									   array('.', '.', '.', '.', '.'), 
									   array('.', '.', '.', '.', '.'), 
									   array('.', '.', '.', '.', '.'));
				$myX = 0;
				$myY = 0;
				$firstMove = TRUE;
			} else {
				$continue = FALSE;
			}
		} elseif ($locationBoard[$myX][$myY] === 'l') {
			echo "You Lose!";
			fwrite(STDOUT, "Play Again?\n");
			$playAgain = fgets(STDIN);
			if($playAgain === "yes" || $playAgain === 'y') {
				$displayBoard = array(array('.', '.', '.', '.', '.'), 
					  				  array('.', '.', '.', '.', '.'), 
					  				  array('.', '.', '.', '.', '.'), 
									  array('.', '.', '.', '.', '.'), 
									  array('.', '.', '.', '.', '.'));
				$locationBoard = array(array('.', '.', '.', '.', '.'), 
									   array('.', '.', '.', '.', '.'), 
									   array('.', '.', '.', '.', '.'), 
									   array('.', '.', '.', '.', '.'), 
									   array('.', '.', '.', '.', '.'));
				$myX = 0;
				$myY = 0;
				$firstMove = TRUE;
			} else {
				$continue = FALSE;
			}
		} 
	}
	echo "\n" . "\n";

	//testing purposes(display locations)
	// for($i = 4; $i >= 0; $i--) {
	// 	for($j = 0; $j < 5; $j++) {
	// 		echo $locationBoard[$j][$i] . "\t";
	// 	}
	// echo "\n";
	// }
	// echo "\n" . "\n";
}





?>