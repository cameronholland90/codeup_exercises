<?php

$nothing = NULL;
$something = '';
$array = array(1,2,3);

// Create a funciton that checks if a variable is set or empty, and display "$variable_name is SET|EMPTY"
function emptyOrSet($var) {
	if (isset($var)) {
		return 'SET';
	} elseif (empty($var)) {
		return 'EMPTY';
	} else {
		return FALSE;
	}
}

// TEST: If var $nothing is set, display '$nothing is SET'
echo "\$nothing is " . emptyOrSet($nothing) . "\n";

// TEST: If var $nothing is empty, display '$nothing is EMPTY'
echo "\$nothing is " . emptyOrSet($nothing) . "\n";

// TEST: If var $something is set, display '$something is SET'
echo "\$nothing is " . emptyOrSet($something) . "\n";

// Serialize the array $array, and output the results
$array = serialize($array);
echo $array . "\n";

// Unserialize the array $array, and output the results
$array = unserialize($array);
var_dump($array);

?>