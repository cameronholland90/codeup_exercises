<?php

$filename;
$handle;
$contents;

// Create array to hold list of todo items
$items = array();
$completeItems = array();

function saveFile($array) {
    $saveList = implode("\n", $array);
    $filename = get_input();
    echo "(O)verwirte, (A)ppend or (C)reate new ";
    $overwrite = get_input(TRUE);
    if ($overwrite === 'O') {
        $handle = fopen($filename, "w");
        fwrite($handle, $saveList);
        fclose($handle);
    } elseif ($overwrite === 'A') {
        $handle = fopen($filename, "a");
        fwrite($handle, $saveList);
        fclose($handle);
    } elseif ($overwrite === 'C') {
        $handle = fopen($filename, "x");
        fwrite($handle, $saveList);
        fclose($handle);
    }
    
}

function openFile() {
    $filename = get_input();
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    fclose($handle);
    return $contents;
}

// List array items formatted for CLI
function list_items($list)
{
    $output = "";
    // Iterate through list items
    foreach ($list as $key => $item) {
        // Display each item and a newline
        $key += 1;
        $output .= "[{$key}] {$item}\n";
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
    echo '(O)pen, (SA)ve, (N)ew item, (R)emove item, (Q)uit, (C)ompleted List, (S)ort: ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = get_input(TRUE);
    
    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        array_push($items, get_input());
    } elseif ($input == 'R') {
        echo '(C)omplete, (D)elete, (B)ack : ';
        $input2 = get_input(TRUE);
        if ($input2 == 'D') {
            // delete which item?
            echo 'Enter item number to delete: ';
            // Get array key
            $key = get_input();
            // Remove from array
            $key -= 1;
            unset($items[$key]);
            $items = array_values($items);
        } elseif ($input2 == 'C') {
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
    } elseif ($input == 'S') {
        echo "(A)-Z, (Z)-A ";
        $input2 = get_input(TRUE);
        if($input2 == 'A') {
            echo '(T)odo List, (C)ompleted List: ';
            $input3 = get_input(TRUE);
            if ($input3 == 'T') {
                sort($items);
                $items = array_values($items);
            } elseif ($input3 == 'C') {
                sort($completeItems);
                $completeItems = array_values($completeItems);
            }
        } elseif ($input2 == 'Z') {
            echo '(T)odo List, (C)ompleted List: ';
            $input3 = get_input(TRUE);
            if ($input3 == 'T') {
                rsort($items);
                $items = array_values($items);
            } elseif ($input3 == 'C') {
                rsort($completeItems);
                $completeItems = array_values($completeItems);
            }
        }
    } elseif ($input === 'B') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        array_unshift($items, get_input());
        $items = array_values($items);
    } elseif ($input === 'E') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        array_push($items, get_input());
    } elseif ($input === 'F') {
        // Ask for entry
        echo 'Removed.' . PHP_EOL;
        // Add entry to list array
        array_shift($items);
        $items = array_values($items);
    } elseif ($input === 'L') {
        // Ask for entry
        echo 'Removed.' . PHP_EOL;
        // Add entry to list array
        array_pop($items);
    } elseif ($input === 'O') {
        echo "What file would you like to open? Please enter the whole filename with path ";
        $fileText = openFile();
        $items = explode("\n", $fileText);
    } elseif ($input === 'SA') {
        echo "What file would you like to save to? Please enter the whole filename with path ";
        saveFile($items);
    }
// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);

?>