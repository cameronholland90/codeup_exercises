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
		$add += $numList[$i];
	}
	return $add . "\n";
}

$first = 10;
$second = 2;

// echo add($first, $second);
// echo subtract($first, $second);
// echo multiply($first, $second);
// echo divide($first, $second);
// echo modulus($first, $second);
echo add2($first, $second, 8, 10, 13);

?>