<?php

$things = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", FALSE, (string) 11);

// foreach ($things as $thing) {
// 	if (is_int($thing)) {
// 		echo "integer\n";
// 	} elseif (is_float($thing)) {
// 		echo "float\n";
// 	} elseif (is_bool($thing)) {
// 		echo "boolean\n";
// 	} elseif (is_array($thing)) {
// 		echo "array\n";
// 	} elseif (is_null($thing)) {
// 		echo "null\n";
// 	} elseif (is_string($thing)) {
// 		echo "string\n";
// 	}
// }

foreach ($things as $thing) {
	if (is_scalar($thing)) {
		echo "$thing\n";
	}
}

?>