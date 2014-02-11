<?php

function add($a, $b) {
    echo ($a + $b) . "\n";
}

function subtract($a, $b) {
    echo ($a - $b) . "\n";
}

function multiply($a, $b) {
    echo ($a * $b) . "\n";
}

function divide($a, $b) {
    echo ($a / $b) . "\n";
}

$first = 10;
$second = 2;

add($first, $second);
subtract($first, $second);
multiply($first, $second);
divide($first, $second);

?>