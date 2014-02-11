<?php

function modulus($a, $b) {
    return ($a % $b) . "\n";
}

function add() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$add = 0;
	for ($i = 0; $i < $numArgs; $i++) { 
		if (is_numeric($numList[$i]) != TRUE) {
	        return "ERROR: All arguments must be numbers\n";
	    }
		if ($i == 0) {
			$add = $numList[$i];
		} else {
			$add += $numList[$i];
		}
	}
	return $add . "\n";
}

function subtract() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$subtract = 0;
	for ($i = 0; $i < $numArgs; $i++) {
		if (is_numeric($numList[$i]) != TRUE) {
	        return "ERROR: All arguments must be numbers\n";
	    }
		if ($i == 0) {
			$subtract = $numList[$i];
		} else {
			$subtract -= $numList[$i];
		}
	}
	return $subtract . "\n";
}

function mulitply() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$mulitply = 0;
	for ($i = 0; $i < $numArgs; $i++) {
		if (is_numeric($numList[$i]) != TRUE) {
	        return "ERROR: All arguments must be numbers\n";
	    }
		if ($i == 0) {
			$mulitply = $numList[$i];
		} else {
			$mulitply *= $numList[$i];
		}
	}
	return $mulitply . "\n";
}

function divide() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$divide = 0;
	for ($i = 0; $i < $numArgs; $i++) { 
		if (is_numeric($numList[$i]) != TRUE) {
	        return "ERROR: All arguments must be numbers\n";
	    }
		if ($i == 0) {
			$divide = $numList[$i];
		} else {
			$divide /= $numList[$i];
		}
	}
	return $divide . "\n";
}

$first = 10;
$second = 2;

// echo add($first, $second);
// echo subtract($first, $second);
// echo multiply($first, $second);
// echo divide($first, $second);
// echo modulus($first, $second);
echo add($first, $second, 13, 'hi', 8);
echo subtract($first, $second, 13, 10, 8);
echo mulitply($first, $second, 13, 10, 8);
echo divide($first, $second, 13, 10, 8);

?>