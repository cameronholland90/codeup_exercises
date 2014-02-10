<?php

$things = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", FALSE, (string) 11);

foreach ($things as $thing) {
	if (is_array($thing)) {
		echo "Array ";
		foreach ($thing as $value) {
			echo "$value ";
		}
		echo "\n";
	} else {
		echo "$thing\n";
	}
}

?>