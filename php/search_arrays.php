<?php

function isInArray($array, $value) {
	return in_array($value, $array);
}

function compare($array1, $array2) {
	$count = 0;
	foreach ($array1 as $key => $value) {
		if(is_numeric(array_search($value, $array2))) {
			$count++;
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