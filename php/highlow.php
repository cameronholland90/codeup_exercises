<?php

$pos = strpos($argv[0], '.');
$program = strstr($argv[0], 0, $pos);
$fileType = substr($argv[0], $pos + 1);

echo "You have run $program!\n";
echo "It is a $fileType file!\n\n";

if ($argc == 3) {
	//variables
	$answer = mt_rand($argv[1], $argv[2]);
	$guess = '';
	$count = 0;

	//computer guess guidelines
	$compLow = $argv[1];
	$compHigh = $argv[2];

	//game
	while(TRUE) {

		fwrite(STDOUT, "What is your guess? ");

		//computer's guess
		$guess = mt_rand($compLow, $compHigh);
		echo $guess . "\n";

		//check guess
		if ($guess < $answer) {
			echo "The number is higher then that\n";
			$compLow = $guess + 1;
			$count++;
		} elseif ($guess > $answer) {
			echo "The number is lower then that\n";
			$compHigh = $guess - 1;
			$count++;
		} else {
			echo "Thats it! Great guess!\n";
			$count++;
			echo "You guessed $count times.\n";
			exit(0);
		}
	}
} else {
	echo "Not enough arguments!";
}


?>