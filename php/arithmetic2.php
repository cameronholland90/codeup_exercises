<?php

function add($a, $b) {
    return ($a + $b) . "\n";
}

function subtract($a, $b) {
    return ($a - $b) . "\n";
}

function multiply($a, $b) {
    return ($a * $b) . "\n";
}

function divide($a, $b) {
    return ($a / $b) . "\n";
}

function modulus($a, $b) {
    return ($a % $b) . "\n";
}

function add2() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$add = 0;
	for ($i = 0; $i < $numArgs; $i++) { 
		if ($i == 0) {
			$add = $numList[$i];
		} else {
			$add += $numList[$i];
		}
	}
	return $add . "\n";
}

function subtract2() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$subtract = 0;
	for ($i = 0; $i < $numArgs; $i++) { 
		if ($i == 0) {
			$subtract = $numList[$i];
		} else {
			$subtract -= $numList[$i];
		}
	}
	return $subtract . "\n";
}

function mulitply2() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$mulitply = 0;
	for ($i = 0; $i < $numArgs; $i++) { 
		if ($i == 0) {
			$mulitply = $numList[$i];
		} else {
			$mulitply *= $numList[$i];
		}
	}
	return $mulitply . "\n";
}

function divide2() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$divide = 0;
	for ($i = 0; $i < $numArgs; $i++) { 
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
echo add2($first, $second, 13, 10, 8);
echo subtract2($first, $second, 13, 10, 8);
echo mulitply2($first, $second, 13, 10, 8);
echo divide2($first, $second, 13, 10, 8);

?>