<?php

// initial set up of boards
$myBoard = array(array(' ', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
				 array('A', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				 array('B', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				 array('C', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				 array('D', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				 array('E', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'),
				 array('F', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				 array('G', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				 array('H', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				 array('I', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				 array('J', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'));
$compBoard = array(array(' ', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
				   array('A', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				   array('B', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				   array('C', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				   array('D', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				   array('E', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'),
				   array('F', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				   array('G', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				   array('H', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				   array('I', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
				   array('J', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'));
$compDisplayBoard = array(array(' ', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'),
						  array('A', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						  array('B', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						  array('C', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						  array('D', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						  array('E', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'),
						  array('F', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						  array('G', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						  array('H', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						  array('I', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'), 
						  array('J', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'));

// set up location arrays for ships and place ships on user and computer board
//users
$battleship = array();
$submarine = array();
$destroyer = array();
$patrolBoat = array();
$aircraftCarrier = array();

//computers
$comp_battleship = array();
$comp_submarine = array();
$comp_destroyer = array();
$comp_patrolBoat = array();
$comp_aircraftCarrier = array();

echo "\t\t\t\tBATTLESHIP\n\n";
echo "B = battleship, S = Sub, D = Destroyer, P = Patrol boat, A = Aircraft Carrier\n\t\t\tX = hit and 0 = miss\n\n";

// display computer board with only hit and miss
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


?>