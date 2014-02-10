<?php

// Set the default timezone
date_default_timezone_set('America/Chicago');

// Get Day of Week as number
// 1 (for Monday) through 7 (for Sunday)
// $day_of_week = mt_rand(1, 7);

// switch($day_of_week) {
//     case 1:
//         echo "Today is Monday.";
//         break;
//     case 2: 
//         echo "Today is Tuesday.";
//         break;
//     case 3: 
//         echo "Today is Wednesday.";
//         break;
//     case 4: 
//         echo "Today is Thursday.";
//         break;
//     case 5: 
//         echo "Today is Friday.";
//         break;
//     default:
//     	echo "It is the Weekend";
//     	break;
// }

$month_of_year = mt_rand(1, 12);

switch($month_of_year) {
    case 1:
        echo "The Month is January.";
        break;
    case 2: 
        echo "The Month is February.";
        break;
    case 3: 
        echo "The Month is March.";
        break;
    case 4: 
        echo "The Month is April.";
        break;
    case 5: 
        echo "The Month is May.";
        break;
    case 6: 
        echo "The Month is June.";
        break;
    case 7: 
        echo "The Month is July.";
        break;
    case 8: 
        echo "The Month is August.";
        break;
    case 9: 
        echo "The Month is September.";
        break;
    case 10: 
        echo "The Month is October.";
        break;
    case 11: 
        echo "The Month is November.";
        break;
    case 12: 
        echo "The Month is December.";
        break;
}

echo "\n";

?>