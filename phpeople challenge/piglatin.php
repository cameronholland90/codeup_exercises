<?php

function get_input($upper = false) {
    // Return filtered STDIN input
    if($upper == TRUE) {
        return strtoupper(trim(fgets(STDIN)));
    } else {
        return trim(fgets(STDIN));
    }
}

do{
	echo "What would you like to convert to Pig Latin? ";
	$input = get_input();
	$array = explode(' ', $input);
	$newWord = '';
	$firstLetter;
	foreach ($array as $word) {
		$firstLetter = substr($word, 0, 1);
		if (ctype_upper($firstLetter)) {
			$firstLetter = strtolower($firstLetter);
			$secondLetter = strtoupper(substr(substr($word, 1), 0, 1));
		} else {
			$secondLetter = substr(substr($word, 1), 0, 1);
		}
		
		$newWord .= $secondLetter . substr($word, 2) . $firstLetter . 'ay ';
	}
	echo $newWord . "\n";

	echo "Would you like to convert another? (Y)es or (N)o ";
  $continue = get_input(TRUE);
  if ($continue === 'Y') {
    $continue = TRUE;
  } elseif ($continue === 'N') {
    $continue = FALSE;
  }

} while($continue)

?>