<?php

$string = "1 3 5 7 9 11 13 15 19 21 23";
$string = explode(' ', $string);
$length = count($string) - 1;
$difference = ($string[$length] - $string[0]) / count($string);
$compare = range($string[0], $string[$length], $difference);
$diffArray = array_values(array_diff($compare, $string));
echo $diffArray[0] . "\n";

?>