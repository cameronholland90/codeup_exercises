<?php

function openFile() {
    $filename = get_input();
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    return $contents;
}

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

function filterPlay($play) {
	foreach ($play as $key => $value) {
		if ($value === "") {
			unset($play[$key]);
		}
	}
	$play = array_values($play);
	return $play;
}

function findMyLines($play, $name) {
	$nameWithPeriod = $name . '.';
	$nameWithSpace = $name . ' ';
	$myLines = '';
	foreach ($play as $key => $value) {
		if ((substr($value, 0, strlen($name) + 1) === $nameWithPeriod) || (substr($value, 0, strlen($name) + 1) === $nameWithSpace)) {
			$myLines .= $value . "\n\n";
		}
	}
	return $myLines;
}

function findMyLinesWithQues($play, $name) {
	$nameWithPeriod = $name . '.';
	$nameWithSpace = $name . ' ';
	$myLines = '';
	foreach ($play as $key => $value) {
		$queKey = $key - 1;
		if ((substr($value, 0, strlen($name) + 1) === $nameWithPeriod) || (substr($value, 0, strlen($name) + 1) === $nameWithSpace)) {
			$myLines .= $play[$queKey] . "\n\n" . $value . "\n\n";
		}
	}
	return $myLines;
}

echo "What play file do you want to use? ";
$play = openFile();
$play = explode("\n\n", $play);
$play = filterPlay($play);

echo "What is your character's name? ";
$name = get_input();

echo "What phase? 1, 2 or 3? ";
$phase = get_input();

if ($phase == 1) {
	$yourLines = findMyLines($play, $name);
} elseif ($phase == 2) {
	$yourLines = findMyLinesWithQues($play, $name);
} elseif ($phase == 3) {
	
} else {
	$yourLines = "Thats not one of the options!";
}

echo $yourLines;

?>