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
	echo "What would you like to convert to English? ";
	$input = get_input();
	$array = explode(' ', $input);
	$newWords = '';

	foreach($array as $word)
	{
		$firstLetter = substr($word, 0, 1);
		if(ctype_upper($firstLetter))
		{
			$firstLetter = strtolower($firstLetter);
			$trueFirstLetter = strtoupper(substr($word, -3, 1));
		}
		else 
		{
			$trueFirstLetter = (substr($word, -3, 1));
		}

		$eng_word = substr($word, 1, -3);
		$newWords .= $trueFirstLetter . $firstLetter . $eng_word . ' ';
	}	
	echo $newWords . "\n";

	echo "Would you like to convert another? (Y)es or (N)o ";
  $continue = get_input(TRUE);
  if ($continue === 'Y') {
    $continue = TRUE;
  } elseif ($continue === 'N') {
    $continue = FALSE;
  }

} while($continue)

?>