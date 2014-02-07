<?php

$answer = mt_rand(1, 100);
$guess = '';
$count = 0;

while(TRUE) {
	fwrite(STDOUT, "Guess? ");
	$guess = fgets(STDIN);
	if ($guess < $answer) {
		echo "HIGHER\n";
		$count++;
	} elseif ($guess > $answer) {
		echo "LOWER\n";
		$count++;
	} else {
		echo "GOOD GUESS!\n";
		$count++;
		echo "$count\n";
		exit(0);
	}
}

?>