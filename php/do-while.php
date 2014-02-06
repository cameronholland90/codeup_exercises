<?php

$count = 0;

do {
	echo "$count\n";
	$count += 2;
} while ($count < 100);

do {
	echo "$count\n";
	$count -= 5;
} while ($count >= -10);

?>