<?php

$books = array(
    'The Hobbit' => array(
        'published' => 1937,
        'author' => 'J. R. R. Tolkien',
        'pages' => 310
    ),
    'Game of Thrones' => array(
        'published' => 1996,
        'author' => 'George R. R. Martin',
        'pages' => 835
    ),
    'The Catcher in the Rye' => array(
        'published' => 1951,
        'author' => 'J. D. Salinger',
        'pages' => 220
    ),
    'A Tale of Two Cities' => array(
        'published' => 1859,
        'author' => 'Charles Dickens',
        'pages' => 544
    )
);

if($argc == 2) {
	$year = $argv[1];
} else {
	$year = 1950;
}

ksort($books);

foreach ($books as $title => $book) {
	if ($book['published'] > $year) {
		echo "{$title}:\n";
		foreach ($book as $info => $value) {
			echo "{$info} - $value\n";
		}
		echo "\n";
	}
}

?>