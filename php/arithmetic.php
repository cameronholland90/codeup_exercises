<?php

function add($a, $b) {
    return ($a + $b) . "\n";
}

function subtract($a, $b) {
    return ($a - $b) . "\n";
}

function multiply($a, $b) {
    return ($a * $b) . "\n";
}

function divide($a, $b) {
    return ($a / $b) . "\n";
}

function modulus($a, $b) {
    return ($a % $b) . "\n";
}

$first = 10;
$second = 2;

echo add($first, $second);
echo subtract($first, $second);
echo multiply($first, $second);
echo divide($first, $second);
echo modulus($first, $second);

?>