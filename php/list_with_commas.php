<?php

function smart_implode($glue, $array, $alpha = FALSE) {
	if ($alpha) {
		sort($array);
	}
	$last_item = array_pop($array);
	$return = implode($glue, $array);
	$return .= " and " . $last_item;
	return $return;
}

function get_input($upper = FALSE) 
{
    $userInput = trim(fgets(STDIN));
    if ($upper === TRUE) {
        return strtoupper($userInput);
    } else {
        return $userInput;
    }
}

$physicists_array = array('Gordon Freeman', 'Samantha Carter', 'Sheldon Cooper', 'Quinn Mallory', 'Bruce Banner', 'Tony Stark');

echo "Would you like to add fake physicists to the array? ";
$input = get_input(TRUE);
while ($input === 'YES'){
	echo "Who would you like to add? Please put first and last name ";
	$physicists_array[] = get_input();
	echo "Continue adding?";
	$input = get_input(TRUE);
}

echo "\n";

$famous_fake_physicists = smart_implode(', ', $physicists_array);

echo "Some of the most famous fictional theoretical physicists are {$famous_fake_physicists}.\n";

$famous_fake_physicists = smart_implode(', ', $physicists_array, TRUE);

echo "Some of the most famous fictional theoretical physicists are {$famous_fake_physicists}.\n";

?>