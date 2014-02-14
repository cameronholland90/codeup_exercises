<?php

$morseCodes = array(
  '0' => "-----",
  '1' => ".----",
  '2' => "..---",
  '3' => "...--",
  '4' => "....-",
  '5' => ".....",
  '6' => "-....",
  '7' => "--...",
  '8' => "---..",
  '9' => "----.",
  'A' => ".-",
  'B' => "-...",
  'C' => "-.-.",
  'D' => "-..",
  'E' => ".",
  'F' => "..-.",
  'G' => "--.",
  'H' => "....",
  'I' => "..",
  'J' => ".---",
  'K' => "-.-",
  'L' => ".-..",
  'M' => "--",
  'N' => "-.",
  'O' => "---",
  'P' => ".--.",
  'Q' => "--.-",
  'R' => ".-.",
  'S' => "...",
  'T' => "-",
  'U' => "..-",
  'V' => "...-",
  'W' => ".--",
  'X' => "-..-",
  'Y' => "-.--",
  'Z' => "--..",
  "." => ".-.-.-",
  "," => "--..--",
  "?" => "..--..",
  "!" => "-.-.--",
  "/" => "-..-.",
  "(" => "-.--.-",
  ")" => "-.--.-",
  "&" => ".-...",
  ":" => "---...",
  ";" => "-.-.-.",
  "=" => "-...-",
  "+" => ".-.-.",
  "-" => "-....-",
  "_" => "..--.-",
  "\"" => ".-..-.",
  "$" => "...-..-",
  "@" => ".--.-.)",
  " " => "/"
  );

function get_input($upper = false) {
    // Return filtered STDIN input
    if($upper == TRUE) {
        return strtoupper(trim(fgets(STDIN)));
    } else {
        return trim(fgets(STDIN));
    }
}

do {
  echo "What would you like to translate to Morse Code? ";
  $input = get_input(TRUE);
  $char = str_split($input, 1);
  foreach ($char as $letter) {
    echo $morseCodes[$letter];
  }
  echo "\n";

  echo "Would you like to convert another? (Y)es or (N)o ";
  $continue = get_input(TRUE);
  if ($continue === 'Y') {
    $continue = TRUE;
  } elseif ($continue === 'N') {
    $continue = FALSE;
  }

} while($continue)

?>