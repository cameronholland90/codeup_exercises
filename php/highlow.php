<?php

$answer = rand(1, 100);
$guess = '';

while(TRUE) {
	fwrite(STDOUT, "Guess? ");
	$guess = fgets(STDIN);
	if ($guess < $answer) {
		echo "HIGHER\n";
	} elseif ($guess > $answer) {
		echo "LOWER\n";
	} else {
		echo "GOOD GUESS!\n";
		exit(0);
	}
}

?>