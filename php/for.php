<?php

fwrite(STDOUT, "What number do you want to start with? ");
$start = intval(fgets(STDIN));
fwrite(STDOUT, "What number do you want to end with? ");
$end = intval(fgets(STDIN));
fwrite(STDOUT, "What increment do you want to use? ");
$increase = intval(fgets(STDIN));
if($increase == 0) {
	$increase = 1;
}

?>