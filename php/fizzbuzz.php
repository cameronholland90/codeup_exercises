<?php

$pos = strpos($argv[0], '.');
$program = substr($argv[0], 0, $pos);
$fileType = substr($argv[0], $pos + 1);

echo "You have run $program!\n";
echo "It is a $fileType file!\n\n";

fwrite(STDOUT, "What is your low number? ");
$rangeLow = rtrim(fgets(STDIN));
fwrite(STDOUT, "What is your high number?");
$rangeHigh = rtrim(fgets(STDIN));

for ($i = $rangeLow; $i <= $rangeHigh; $i++) { 
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