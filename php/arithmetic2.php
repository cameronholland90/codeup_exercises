<?php

// function holding all error messages
function error($operator, $num = 1) {
	if($operator === '/' && $num == 0) {
		// error for dividing by 0
		return "You tried to divide by 0.\n";

	} elseif ($operator === '%' && $num == 0) {
		// error for modulating by 0
		return "You tried to modululate by 0.\n";

	} elseif ($operator === '2') {
		// error for using more then 2 arguments in functions that only allow 2
		return "ERROR: Only works with 2 arguments.\n";

	}else {
		// error if a number was not passed to a function that does not allow none numberic values
		return "ERROR: All arguments must be numbers. You passed " . $num . "\n";

	}
}

// function to find remainder of 2 numbers
function modulus() {
	$numArgs = func_num_args();		// gets number of arguments passed to function
	$numList = func_get_args();		// makes array of arguments passed to function
	$modulus = 0;
	for ($i = 0; $i < $numArgs; $i++) { 	// runs through all arguments for code below(could use foreach loop)
		if ($numArgs < 2 || $numArgs > 2) {
			return error('2');		// returns error if 2 arguments are not passed to the function
		}
		if ($numList[$i] == 0) {
	    	echo error('%', $numList[$i]);		// prints message if 0 is passed as an arguement
	    	return FALSE;
	    }
		if (is_numeric($numList[$i]) != TRUE) {
	        return error('', $numList[$i]);		// returns error if an argument is not numeric
	    }
		if ($i == 0) {
			$modulus = $numList[$i];		// makes $modulus equal the first argument passed
		} else {
			$modulus %= $numList[$i];		// uses second arguement to modulate the first arguement
		}
	}
	return $modulus . "\n";
}

// function to add any number of arguments
function add() {
	$numArgs = func_num_args();		// gets number of arguments passed to function
	$numList = func_get_args();		// makes array of arguments passed to function
	$add = 0;
	for ($i = 0; $i < $numArgs; $i++) { 	// runs through all arguments for code below(could use foreach loop)
		if (is_numeric($numList[$i]) != TRUE) {		
	        return error('', $numList[$i]);		// returns error if an argument is not numeric
	    }
		if ($i == 0) {
			$add = $numList[$i];		// makes $add equal the first argument passed
		} else {
			$add += $numList[$i];		// adds all the arguements together
		}
	}
	return $add . "\n";
}

// function to subtract any number of arguments
function subtract() {
	$numArgs = func_num_args();		// gets number of arguments passed to function
	$numList = func_get_args();		// makes array of arguments passed to function
	$subtract = 0;
	for ($i = 0; $i < $numArgs; $i++) {		// runs through all arguments for code below(could use foreach loop)
		if (is_numeric($numList[$i]) != TRUE) {
	        return error('', $numList[$i]);		// returns error if an argument is not numeric
	    }
		if ($i == 0) {
			$subtract = $numList[$i];		// makes $subtract equal the first argument passed
		} else {
			$subtract -= $numList[$i];		// subtracts each argument from $subtract and makes $subtract equal the new value
		}
	}
	return $subtract . "\n";
}

// function to mulitiply any number of arguments
function mulitply() {
	$numArgs = func_num_args();		// gets number of arguments passed to function
	$numList = func_get_args();		// makes array of arguments passed to function
	$mulitply = 0;
	for ($i = 0; $i < $numArgs; $i++) {		// runs through all arguments for code below(could use foreach loop)
		if (is_numeric($numList[$i]) != TRUE) {
	        return error('', $numList[$i]);		// returns error if an argument is not numeric
	    }
		if ($i == 0) {
			$mulitply = $numList[$i];		// makes $mulitply equal the first argument passed
		} else {
			$mulitply *= $numList[$i];		// mulitplies all arguments together
		}
	}
	return $mulitply . "\n";
}

// function to divide any number of arguments
function divide() {
	$numArgs = func_num_args();		// gets number of arguments passed to function
	$numList = func_get_args();		// makes array of arguments passed to function
	$divide = 0;
	for ($i = 0; $i < $numArgs; $i++) { 	// runs through all arguments for code below(could use foreach loop)
		if (is_numeric($numList[$i]) != TRUE) {
	        return error('', $numList[$i]);		// returns error if an argument is not numeric
	    }
	    if ($numList[$i] == 0) {
	    	echo error('/', $numList[$i]);;		// prints message if 0 is passed as an arguement
	    	return FALSE;
	    }
		if ($i == 0) {
			$divide = $numList[$i];		// makes $divide equal the first argument passed
		} else {
			$divide /= $numList[$i];	// divides $divide by each argument and makes $divide equal the new value
		}
	}
	return $divide . "\n";
}

$first = 10;
$second = 2;



// calls functions and echos what it returns
echo modulus($first, $second);
echo add($first, $second, 13, 10, 8);
echo subtract($first, $second, 13, 10, 8);
echo mulitply($first, $second, 13, 10, 8);
echo divide($first, $second, 13, 10, 8);

?>