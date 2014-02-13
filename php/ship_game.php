<?php

$newGame = TRUE;
//$count = 0;

function newLocation($list, $newHit) {
	foreach ($list as $location) {
		if($newHit === $location) {
			return FALSE;
		} 
	}
	return TRUE;
}

function allShipsSunk($list) {
	foreach ($list as $type => $ship) {
	 	foreach ($ship as $key => $location) {
	 		if ($location !== 'X') {
	 			return FALSE;
	 		}
	 	}
	}
	return TRUE;
}

function markShip($list, $hit) {
 	foreach ($list as $key => $location) {
 		if ($location === $hit) {
 			return $key;
 		}
 	}
	return FALSE;
}

// make function to check spaces for another ship
function willCollide($locations, $board) {
	foreach ($locations as $coord) {
		$row = substr($coord, 0, 1);
		$column = substr($coord, 1);
		echo $row . $column;
		if ($board[$row][$column] !== '.') {
			return TRUE;
			echo $row . $column;
		}
	}
	exit(0);
	return FALSE;
}

// loop for game
while(TRUE) {
	if ($newGame) {
		// stores previous turns for comp and user
		$prevHits = array(' ');
		$compPrevHits = array(' ');

		$comp_ships = array('B' => array('', '', '', ''),
						   'S' => array('', '', ''),
						   'D' => array('', '', ''),
						   'P' => array('', ''),
						   'A' => array('', '', '', '', ''));

		$ships = array('B' => array('', '', '', ''),
					   'S' => array('', '', ''),
					   'D' => array('', '', ''),
					   'P' => array('', ''),
					   'A' => array('', '', '', '', ''));

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
		

	foreach ($ships as $type => $locations) {
		do{
			$repeat = TRUE;
			//asks user row, column and direction(randomizes if nothing is entered, wrong value entered)
			fwrite(STDOUT, "What row do you want the $type to start in? rows = letters ");
			$row = ord(strtoupper(trim(fgets(STDIN))));
			if (($row < 65 || $row > 75) || (is_numeric($row) === FALSE)) {
				$row = mt_rand(ord('A'), ord('J'));
			}
			fwrite(STDOUT, "What column do you want the $type to start in? ");
			$column = trim(fgets(STDIN));
			if ($column < 1 || $column > 10 || is_numeric($column) == FALSE) {
				$column = mt_rand(1, 10);
			}
			fwrite(STDOUT, "What direction would you like it to go? 1 = left, 2 = right, 3 = up or 4 = down ");
			$direction = trim(fgets(STDIN));
			if (($direction != 1 && $direction != 2) && ($direction != 3 && $direction != 4) && ($direction != 'left' && $direction != 'right') && ($direction != 'up' && $direction != 'down')) {
				$direction = mt_rand(1, 4);
			}

			// checks if ship will go outside of board, opposite direction if it will
			if (($direction === 'up' || $direction == 3) && ($row < (65 + count($locations)))) {
				$direction = 4;
			} elseif (($direction === 'down' || $direction == 4) && ($row > (65 + count($locations)))) {
				$direction = 3;
			}

			if (($direction === 'left' || $direction == 1) && ($column <  count($locations))) {
				$direction = 2;
			} elseif (($direction === 'right' || $direction == 2) && ($column > count($locations))) {
				$direction = 1;
			}

			$column2 = $column;
			$row2 = $row;
			foreach ($locations as $key => $location) {
				switch ($direction) {
					case 1:
					case 'left':
						$ships[$type][$key] = "" . chr($row2) . $column2 . "";	
						$column2--;
						break;
					case 2:
					case 'right':
						$ships[$type][$key] = "" . chr($row2) . $column2 . "";
						$column2++;
						break;
					case 3:
					case 'up':
						$ships[$type][$key] = "" . chr($row2) . $column2 . "";
						$row2--;
						break;
					case 4:
					case 'down':
						$ships[$type][$key] = "" . chr($row2) . $column2 . "";
						$row2++;
						break;
				}
			}

			if (willCollide($locations, $myBoard)) {
				continue;
			} else{
				$repeat = FALSE;
			}

			foreach ($locations as $key => $location) {
				switch ($direction) {
					case 1:
					case 'left':
						$ships[$type][$key] = "" . chr($row) . $column . "";
						$myBoard[chr($row)][$column] = $type;
						$column--;
						break;
					case 2:
					case 'right':
						$ships[$type][$key] = "" . chr($row) . $column . "";
						$myBoard[chr($row)][$column] = $type;
						$column++;
						break;
					case 3:
					case 'up':
						$ships[$type][$key] = "" . chr($row) . $column . "";
						$myBoard[chr($row)][$column] = $type;
						$row--;
						break;
					case 4:
					case 'down':
						$ships[$type][$key] = "" . chr($row) . $column . "";
						$myBoard[chr($row)][$column] = $type;
						$row++;
						break;
				}
			}
		} while($repeat);
	}

		// computer's
		

		// randomly place computer pieces
		$comp_setup = TRUE;
		foreach ($comp_ships as $type => $locations) {
			// randomly decides computer's ships' coordinates and direction
			$row = mt_rand(ord('A'), ord('J'));
			$column = mt_rand(1, 10);
			$direction = mt_rand(1,4);

			// checks if ship will go outside of board, opposite direction if it will
			if ($direction == 3 && ($row < (65 + count($locations)))) {
				$direction++;
			} elseif ($direction == 4 && ($row > (65 + count($locations)))) {
				$direction--;
			}

			if ($direction == 1 && ($column <  count($locations))) {
				$direction++;
			} elseif ($direction == 2 && ($column > count($locations))) {
				$direction--;
			}

			

			// places computer's ships on board
			foreach ($locations as $key => $location) {
				switch ($direction) {
					case 1:
					case 'left':
						$comp_ships[$type][$key] = "" . chr($row) . $column . "";	
						$compBoard[chr($row)][$column] = $type;
						$column--;
						break;
					case 2:
					case 'right':
						$comp_ships[$type][$key] = "" . chr($row) . $column . "";
						$compBoard[chr($row)][$column] = $type;
						$column++;
						break;
					case 3:
					case 'up':
						$comp_ships[$type][$key] = "" . chr($row) . $column . "";
						$compBoard[chr($row)][$column] = $type;
						$row--;
						break;
					case 4:
					case 'down':
						$comp_ships[$type][$key] = "" . chr($row) . $column . "";
						$compBoard[chr($row)][$column] = $type;
						$row++;
						break;
				}
			}
		}
	}

	

	// take user's coords to atttack/refresh screen
	$attacking = TRUE;
	while ($attacking) {

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

		$myTurn = TRUE;
		while($myTurn) {
			fwrite(STDOUT, "What row is your taget location? ");
			$hitRow = strtoupper(trim(fgets(STDIN)));
			fwrite(STDOUT, "What column is your taget location? ");
			$hitColumn = trim(fgets(STDIN));
			$coord = $hitRow . $hitColumn;
			if (!array_key_exists($hitRow, $compBoard)) {
				echo "That row doesn't exist.\n";
				continue;
			}
			if ($hitColumn < 1 || $hitColumn > 10) {
				echo "That column doesn't exist\n";
				continue;
			}
			if (newLocation($prevHits, $coord)) {
				if ($compBoard[$hitRow][$hitColumn] != '.') {
					$placeValue = $compBoard[$hitRow][$hitColumn];
					$compDisplayBoard[$hitRow][$hitColumn] = 'X';
					$compBoard[$hitRow][$hitColumn] = 'X';
					$myTurn = FALSE;
					$shipHit = markShip($comp_ships[$placeValue], $coord);
					$comp_ships[$placeValue][$shipHit] = 'X';
				} else {
					$compDisplayBoard[$hitRow][$hitColumn] = 'O';
					$compBoard[$hitRow][$hitColumn] = 'O';
					$myTurn = FALSE;
				}
			} else {
				echo "You have already shot there. Try again.\n";
			}
			$prevHits[] = $hitRow . $hitColumn;
		}

		$attacking = !allShipsSunk($comp_ships);
		if ($attacking === FALSE) {
			echo "You have won! Congratulations!";
		} else {
			$compTurn = TRUE;
			while($compTurn) {
				// computer picks random location to attack(need to fix issue with picking same location more then once)
				$hitRow = chr(mt_rand(ord('A'), ord('J')));
				$hitColumn = mt_rand(1, 10);
				$coord = $hitRow . $hitColumn;
				if (newLocation($compPrevHits, $coord)) {
					if ($myBoard[$hitRow][$hitColumn] != '.') {
						$placeValue = $myBoard[$hitRow][$hitColumn];
						$myBoard[$hitRow][$hitColumn] = 'X';
						$compTurn = FALSE;
						$shipHit = markShip($ships[$placeValue], $coord);
						$ships[$placeValue][$shipHit] = 'X';
					} else {
						$myBoard[$hitRow][$hitColumn] = 'O';
						$compTurn = FALSE;
					}			
				}
				$compPrevHits[] = $hitRow . $hitColumn;
			} 

			$attacking = !allShipsSunk($ships);
			if ($attacking === FALSE) {
				echo "Computer has won! You lose!";
			}
		}
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