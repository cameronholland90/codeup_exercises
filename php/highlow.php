<?php

$answer = mt_rand(1, 100);
$guess = '';
$count = 0;
$compLow = 1;
$compHigh = 100;

while(TRUE) {
	fwrite(STDOUT, "Guess? ");
	$guess = mt_rand($compLow, $compHigh);
	echo $guess . "\n";
	if ($guess < $answer) {
		echo "HIGHER\n";
		$compLow = $guess + 1;
		$count++;
	} elseif ($guess > $answer) {
		echo "LOWER\n";
		$compHigh = $guess - 1;
		$count++;
	} else {
		echo "GOOD GUESS!\n";
		$count++;
		echo "$count\n";
		exit(0);
	}
}

?>