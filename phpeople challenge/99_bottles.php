<?php

for ($beerCount = 99; $beerCount >= 0; $beerCount--) { 
	$beerCount2 = $beerCount - 1;
	if($beerCount == 2) {
		echo "{$beerCount} bottles of beer on the wall, {$beerCount} bottles of beer. Take one down and pass it around, {$beerCount2} bottle of beer on the wall.\n";
	} elseif ($beerCount == 1) {
		echo "{$beerCount} bottle of beer on the wall, {$beerCount} bottles of beer. Take one down and pass it around, no more bottles of beer on the wall.\n";
	} elseif ($beerCount == 0) {
		echo "No more bottles of beer on the wall, no more bottles of beer. Go to the store and buy some more, 99 bottles of beer on the wall.\n";
	} else {
		echo "{$beerCount} bottles of beer on the wall, {$beerCount} bottles of beer. Take one down and pass it around, {$beerCount2} bottles of beer on the wall.\n";
	}
}

?>