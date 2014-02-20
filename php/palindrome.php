<?php

function checkForPalindrom($word) {
	$word = strtolower($word);
	$mid;
	$temp1 = substr($word, 0, 1);
	$temp2 = substr($word, 0, 1);
	if (strlen($word) % 2 === 1) {
		$mid = (int)(strlen($word)/2);
		$temp1 = substr($word, 0, $mid);
		$temp2 = substr($word, $mid + 1);
		$temp2 = strrev($temp2);
	} else {
		$mid = strlen($word)/2;
		$temp1 = substr($word, 0, $mid);
		$temp2 = substr($word, $mid);
		$temp2 = strrev($temp2);
	}

	if ($temp1 === $temp2) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function get_input() {
    $userInput = trim(fgets(STDIN));
    return $userInput;
}

echo "What word would you like to check if it is a palindrome? ";
$word = get_input();

if (checkForPalindrom($word)) {
	echo "$word is a palindrom.\n";
} else {
	echo "$word is not a palindrom.\n";
}
?>