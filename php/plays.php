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

function findMyLines($play, $name) {
	// echo $name;
	$name .= '.';
	// echo $name;
	$myLines = '';
	foreach ($play as $key => $value) {
		if (substr($value, 0, strlen($name)) === $name) {
			$myLines .= $value . "\n\n";
		}
	}
	// echo $myLines;
	return $myLines;
}

echo "What play file do you want to use? ";
$play = openFile();
$play = explode("\n\n", $play);

echo "What is your character's name? ";
$name = get_input();

$yourLines = findMyLines($play, $name);

echo $yourLines;

// var_dump($play);

?>