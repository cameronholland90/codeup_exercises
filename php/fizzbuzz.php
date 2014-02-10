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
fwrite(STDOUT, "What is your high number? ");
$rangeHigh = rtrim(fgets(STDIN));

// gives user option to change fizz and buzz values
fwrite(STDOUT, "Would you like to change the values to 'Fizz' and 'Buzz'? ");
$answer = rtrim(fgets(STDIN));
if ($answer == 'yes' || $answer == 'y') {
	fwrite(STDOUT, "What would you like to 'Fizz'? ");
	$fizz = rtrim(fgets(STDIN));
	fwrite(STDOUT, "What would you like to 'Buzz'? ");
	$buzz = rtrim(fgets(STDIN));
} 

// sets fizz and buzz values if user does not want to change them
else {
	$fizz = 3;
	$buzz = 5;
}

// loops through all numbers within range given by user
for ($i = $rangeLow; $i <= $rangeHigh; $i++) { 

	// checks if number is a mulitple of 3
	if ($i % $fizz == 0) {
		// checks if number is also a mulitple of 5
		if ($i % $buzz == 0) {
			echo "FizzBuzz\n";
		} else {
			echo "Fizz\n";
		}
	} 

	// checks if number is a mulitple of 5
	else if ($i % $buzz == 0) {
		echo "Buzz\n";
	} 

	// returns number if not a multiple of 3 or 5
	else {
		echo "$i\n";
	}
}

?>