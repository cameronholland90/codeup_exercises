<?php

function get_input($upper = FALSE) 
{
    $userInput = trim(fgets(STDIN));
    if ($upper === TRUE) {
        return strtoupper($userInput);
    } else {
        return $userInput;
    }

    // Return filtered STDIN input
}

function alphabetSoup($string) {
	$string = explode(' ', $string);
	$temp;
	foreach ($string as $key => $word) {
		$firstUpper = FALSE;
		if (ctype_upper(substr($word, 0, 1))) {
			$firstUpper = TRUE;
		}
		$word = strtolower($word);
		$temp = str_split($word, 1);
		sort($temp);
		$temp = implode("", $temp);
		if ($firstUpper) {
			$temp = ucfirst($temp);
		}
		$string[$key] = $temp;
	}
	$string = implode(' ', $string);
	return $string;
}

echo "Please enter a word or words. ";
$string = get_input();
echo $string . "\n";
$string = alphabetSoup($string);
echo $string . "\n";

?>