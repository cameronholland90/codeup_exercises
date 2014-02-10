<?php

// writes out the file name and type
$pos = strpos($argv[0], '.');
$program = substr($argv[0], 0, $pos);
$fileType = substr($argv[0], $pos + 1);

echo "You have run $program!\n";
echo "It is a $fileType file!\n\n";

// asks user for range to run in fizzbuzz
fwrite(STDOUT, "What is your low number? ");
$rangeLow = rtrim(fgets(STDIN));
fwrite(STDOUT, "What is your high number?");
$rangeHigh = rtrim(fgets(STDIN));

// loops through all numbers within range given by user
for ($i = $rangeLow; $i <= $rangeHigh; $i++) { 

	// checks if number is a mulitple of 3
	if ($i % 3 == 0) {
		// checks if number is also a mulitple of 5
		if ($i % 5 == 0) {
			echo "FizzBuzz\n";
		} else {
			echo "Fizz\n";
		}
	} 

	// checks if number is a mulitple of 5
	else if ($i % 5 == 0) {
		echo "Buzz\n";
	} 

	// returns number if not a multiple of 3 or 5
	else {
		echo "$i\n";
	}
}

?>