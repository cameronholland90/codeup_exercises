<?php
/**
 *  This sample a sample program that gets the sum of all numbers cointained in the given number
 **/


// Get STDIN, strip whitespace and newlines, 
function get_input($upper = false) {
    // Return filtered STDIN input
    if($upper == TRUE) {
        return strtoupper(trim(fgets(STDIN)));
    } else {
        return trim(fgets(STDIN));
    }
}

$pesos = 13;
$pounds = 0.6;
$euros = 0.73;

do {
	echo "What is the US dollar amount you would like to convert? ";
	$dollarAmount = get_input();
	echo "(E)uros, (P)esos, (B)ritish Pounds? ";
	$currency = get_input(TRUE);

	if ($currency === 'E') {
		echo $dollarAmount * $euros . PHP_EOL;
	} elseif ($currency === 'P') {
		echo $dollarAmount * $pesos . PHP_EOL;
	} elseif ($currency === 'B') {
		echo $dollarAmount * $pounds . PHP_EOL;
	}

	echo "Would you like to convert another? (Y)es or (N)o ";
	$continue = get_input(TRUE);
	if ($currency === 'Y') {
		$continue = TRUE;
	} elseif ($currency === 'N') {
		$continue = FALSE;
	}

} while($continue)

?>