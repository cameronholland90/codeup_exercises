<?php

for ($i = 1; $i <= 100 ; $i++) { 
	if ($i % 3 == 0) {
		if ($i % 5 == 0) {
			echo "FizzBuzz\n";
		} else {
			echo "Fizz\n";
		}
	} else if ($i % 5 == 0) {
		echo "Buzz\n";
	} else {
		echo "$i\n";
	}
}

?>