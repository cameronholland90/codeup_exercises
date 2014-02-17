<?php

function get_input($upper = false) {
    // Return filtered STDIN input
    if($upper == TRUE) {
        return strtoupper(trim(fgets(STDIN)));
    } else {
        return trim(fgets(STDIN));
    }
}

function openFile() {
    $filename = "diceware.wordlist.txt";
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    return $contents;
}

function getWordPointer() {
	$wordPointer = '';
	for ($i = 0; $i < 5; $i++) { 
		$die = mt_rand(1, 6);
		$wordPointer .= $die;
	}
	return $wordPointer;
}

$tempWordList = openFile();
$tempWordList = explode("\n", $tempWordList);
$wordList = array();

foreach ($tempWordList as $word) {
	$temp = explode("\t", $word);
	$key = $temp[0];
	$wordList[$key] = $temp[1];
}

$password = '';
$wordPointer = '';


echo "How many words would you like in your password? 1-5 ";
$numWords = get_input();

for ($i = 0; $i < $numWords; $i++) { 
	$wordPointer = getWordPointer();
	$password .= $wordList[$wordPointer];
}

echo "Your password is $password\n";

?>