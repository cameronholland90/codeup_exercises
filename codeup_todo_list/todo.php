<?php

// Create array to hold list of todo items
$items = array();
$completeItems = array();

// List array items formatted for CLI
function list_items($list)
{
    $output = "";
    // Iterate through list items
    foreach ($list as $key => $item) {
        // Display each item and a newline
        $key += 1;
        $output = $output . "[" . $key . "] {$item}\n";
    }

    return $output;
}

// Get STDIN, strip whitespace and newlines, 
// and convert to uppercase if $upper is true
function get_input($upper = FALSE) 
{
    $userInput = trim(fgets(STDIN));
    if ($upper === TRUE) {
        return strtoupper($userInput);
    } else {
        return $userInput;
    }

    // Return filtered STDIN input
}

// The loop!
do {
    
    echo list_items($items);

    // Show the menu options
    echo '(N)ew item, (R)emove item, (Q)uit, (C)ompleted List : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = get_input(TRUE);
    
    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        $items[] = get_input();
    } elseif ($input == 'R') {
        echo '(C)omplete, (D)elete, (B)ack : ';
        $input = get_input(TRUE);
        if ($input == 'D') {
            // delete which item?
            echo 'Enter item number to delete: ';
            // Get array key
            $key = get_input();
            // Remove from array
            $key -= 1;
            unset($items[$key]);
            $items = array_values($items);
        } elseif ($input == 'C') {
            // complete which item?
            echo 'Enter item number to complete: ';
            // Get array key
            $key = get_input();
            $key -= 1;
            // add to complete array
            $completeItems[] = $items[$key];
            // Remove from array
            unset($items[$key]);
            $items = array_values($items);
        }
    } elseif ($input == 'C') {
        // display completed list
        echo list_items($completeItems) . "\n\n";
    }
// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);

?>