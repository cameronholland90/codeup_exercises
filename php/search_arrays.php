<?php

function isInArray($array, $value) {
	return in_array($value, $array);
}

function compare($array1, $array2) {
	$count = 0;
	foreach ($array1 as $key1 => $value1) {
		foreach ($array2 as $key2 => $value2) {
			if ($value1 === $value2) {
				$count++;
			}
		}
	}
	return $count;
}

// first names
$names = ['Tina', 'Dana', 'Mike', "Amy", 'Adam'];

$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];

var_dump(isInArray($names, 'Tina'));
var_dump(isInArray($names, 'Bob'));

echo compare($names, $compare) . PHP_EOL;
?>