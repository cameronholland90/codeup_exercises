<?php

fwrite(STDOUT, "What number do you want to start with? ");
$start = rtrim(fgets(STDIN));
fwrite(STDOUT, "What number do you want to end with? ");
$end = rtrim(fgets(STDIN));
fwrite(STDOUT, "What increment do you want to use? ");
$increase = rtrim(fgets(STDIN));
if($increase == "\n") {
	$increase = 1;
}

if(is_numeric($start) && is_numeric($end) && is_numeric($increase)) {
	for($i = $start; $i <= $end; $i += $increase) {
		echo "$i\n";
	}
} else {
	echo "You did not enter numbers!";
}


?>