<?php

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
	echo "not enough arguments";
}


?>