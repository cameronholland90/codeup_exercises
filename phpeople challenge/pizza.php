<?php

$small = 4;
$medium = 6;
$large = 8;
$smallCount = 0;
$mediumCount = 0;
$largeCount = 0;
$extraSlices = 0;

function get_input($upper = false) {
    // Return filtered STDIN input
    if($upper == TRUE) {
        return strtoupper(trim(fgets(STDIN)));
    } else {
        return trim(fgets(STDIN));
    }
}

do {
	echo "How many guests eat only 1 slice of pizza: ";
	$oneSlice = get_input();

	echo "How many guests eat 2 slices of pizza: ";
	$twoSlices = get_input();

	echo "How many guests eat 3 slices of pizza: ";
	$threeSlices = get_input();

	echo "How many guests eat 4 slices of pizza: ";
	$fourSlices = get_input();

	$totalSlices = $oneSlice + ($twoSlices * 2) + ($threeSlices * 3) + ($fourSlices * 4);
	echo $totalSlices . PHP_EOL;
	$pizzaCount = 0;

	if ($totalSlices >= $large) {
		$largeCount = (int)($totalSlices / $large);
		$totalSlices %= $large;
	}

	if ($totalSlices >= $medium) {
		$mediumCount = (int)($totalSlices / $medium);
		$totalSlices %= $medium;
	}

	if ($totalSlices >= $small) {
		$smallCount = (int)($totalSlices / $small);
		$totalSlices %= $small;
	}

	if ($totalSlices != 0) {
		$extraSlices = $small - $totalSlices;
	}

	echo "You need $largeCount large pizzas, $mediumCount medium pizzas and $smallCount small pizzas with $extraSlices slices left over.\n";

	echo "Would you like to convert another? (Y)es or (N)o ";
	$continue = get_input(TRUE);
	if ($continue === 'Y') {
		$continue = TRUE;
	} elseif ($continue === 'N') {
		$continue = FALSE;
	}

} while($continue)

?>