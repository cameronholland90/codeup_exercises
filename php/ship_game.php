<?php

$newGame = TRUE;

// loop for game
while(TRUE) {
	if ($newGame == TRUE) {
		// displays empty board for players reference during setup
		$myBoard = array(array(' ', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
						 'A' => array('A', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						 'B' => array('B', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						 'C' => array('C', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						 'D' => array('D', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						 'E' => array('E', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'),
						 'F' => array('F', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						 'G' => array('G', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						 'H' => array('H', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						 'I' => array('I', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						 'J' => array('J', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'));
		$compBoard = array(array(' ', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
						   'A' => array('A', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						   'B' => array('B', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						   'C' => array('C', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						   'D' => array('D', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						   'E' => array('E', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'),
						   'F' => array('F', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						   'G' => array('G', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						   'H' => array('H', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						   'I' => array('I', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						   'J' => array('J', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'));
		$compDisplayBoard = array(array(' ', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
								  'A' => array('A', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
								  'B' => array('B', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
								  'C' => array('C', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
								  'D' => array('D', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
								  'E' => array('E', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'),
								  'F' => array('F', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
								  'G' => array('G', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
								  'H' => array('H', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
								  'I' => array('I', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
								  'J' => array('J', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'));

		echo "\t\t\t\tBATTLESHIP\n\n";
		echo "B = battleship, S = Sub, D = Destroyer, P = Patrol boat, A = Aircraft Carrier\n\t\t\tX = hit and 0 = miss\n\n";

		echo "Computer's Board:\n";
		foreach ($compDisplayBoard as $yaxis) {
			foreach ($yaxis as $xaxis) {
				echo "$xaxis\t";
			}
			echo "\n";
		}

		echo "\n\n";

		// display user board
		echo "Players's Board:\n";
		foreach ($myBoard as $yaxis) {
			foreach ($yaxis as $xaxis) {
				echo "$xaxis\t";
			}
			echo "\n";
		}

		// set up location arrays for ships and place ships on user and computer board
		//users
		$ships = array('B' => array('', '', '', ''),
					   'S' => array('', '', ''),
					   'D' => array('', '', ''),
					   'P' => array('', ''),
					   'A' => array('', '', '', '', ''));

		foreach ($ships as $type => $locations) {
			//asks user row, column and direction(randomizes if nothing is entered, wrong value entered)
			fwrite(STDOUT, "What row do you want the $type to start in? rows = letters ");
			$row = ord(strtoupper(trim(fgets(STDIN))));
			if ($row < 65 || $row > 75 || is_numeric($row) == FALSE) {
				$row = mt_rand(ord('A'), ord('J'));
			}
			fwrite(STDOUT, "What column do you want the $type to start in? ");
			$column = trim(fgets(STDIN));
			if ($column < 1 || $column > 10 || is_numeric($column) == FALSE) {
				$column = mt_rand(1, 10);
			}
			fwrite(STDOUT, "What direction would you like it to go? 1 = left, 2 = right, 3 = up or 4 = down ");
			$direction = trim(fgets(STDIN));
			if ($direction < 1 || $direction > 4 || is_numeric($direction) == FALSE) {
				$direction = mt_rand(1, 4);
			}

			// checks if ship will go outside of board, opposite direction if it will
			if ($direction == 3 && $row < 65 + count($locations)) {
				$direction++;
			} elseif ($direction == 4 && $row > 65 + count(count($locations))) {
				$direction--;
			}

			if ($direction == 1 && $column <=  count($locations)) {
				$direction++;
			} elseif ($direction == 2 && $column >= count(count($locations))) {
				$direction--;
			}
			
			foreach ($locations as $key => $location) {
				switch ($direction) {
					case 1:
					case 'left':
						$location = $type;	
						$myBoard[chr($row)][$column] = $type;
						$column--;
						break;
					case 2:
					case 'right':
						$location = $type;
						$myBoard[chr($row)][$column] = $type;
						$column++;
						break;
					case 3:
					case 'up':
						$location = $type;
						$myBoard[chr($row)][$column] = $type;
						$row--;
						break;
					case 4:
					case 'down':
						$location = $type;
						$myBoard[chr($row)][$column] = $type;
						$row++;
						break;
				}
			}
		}

		// computer's
		$comp_ships = array('B' => array('', '', '', ''),
						   'S' => array('', '', ''),
						   'D' => array('', '', ''),
						   'P' => array('', ''),
						   'A' => array('', '', '', '', ''));

		// randomly place computer pieces
		$comp_setup = TRUE;
		foreach ($comp_ships as $type => $locations) {
			// randomly decides computer's ships' coordinates and direction
			$row = mt_rand(ord('A'), ord('J'));
			$column = mt_rand(1, 10);
			$direction = mt_rand(1,4);

			// checks if ship will go outside of board, opposite direction if it will
			if ($direction == 3 && $row < 65 + count($locations)) {
				$direction++;
			} elseif ($direction == 4 && $row > 65 + count(count($locations))) {
				$direction--;
			}

			if ($direction == 1 && $column <=  count($locations)) {
				$direction++;
			} elseif ($direction == 2 && $column >= count(count($locations))) {
				$direction--;
			}

			// places computer's ships on board
			foreach ($locations as $key => $location) {
				switch ($direction) {
					case 1:
					case 'left':
						$location = $type;	
						$compDisplayBoard[chr($row)][$column] = $type;
						$column--;
						break;
					case 2:
					case 'right':
						$location = $type;
						$compDisplayBoard[chr($row)][$column] = $type;
						$column++;
						break;
					case 3:
					case 'up':
						$location = $type;
						$compDisplayBoard[chr($row)][$column] = $type;
						$row--;
						break;
					case 4:
					case 'down':
						$location = $type;
						$compDisplayBoard[chr($row)][$column] = $type;
						$row++;
						break;
				}
			}
		}
	}

	// displays boards after ship set up
	echo "\t\t\t\tBATTLESHIP\n\n";
	echo "B = battleship, S = Sub, D = Destroyer, P = Patrol boat, A = Aircraft Carrier\n\t\t\tX = hit and 0 = miss\n\n";

	// display computer board with only hit and miss(final version will not display computer ship locations)
	echo "Computer's Board:\n";
	foreach ($compDisplayBoard as $yaxis) {
		foreach ($yaxis as $xaxis) {
			echo "$xaxis\t";
		}
		echo "\n";
	}

	echo "\n\n";

	// display user board
	echo "Players's Board:\n";
	foreach ($myBoard as $yaxis) {
		foreach ($yaxis as $xaxis) {
			echo "$xaxis\t";
		}
		echo "\n";
	}

	// take user's coords to atttack/refresh screen
	$attacking = TRUE;
	while ($attacking) {
		break;
	}

	// randomize computers coords to attack/refresh screen
	fwrite(STDOUT, "Continue?");
	$answer = trim(fgets(STDIN));
	if ($answer == 'y' || $answer == 'yes') {
		$newGame = TRUE;
	} else {
		exit(0);
	}
}



?>