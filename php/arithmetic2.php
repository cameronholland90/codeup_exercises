<?php

function error($operator, $num = 1) {
	if($operator === '/') {
		if ($num == 0) {
			return "You tried to divide by 0. Skipped this argument. \n";
		}
		return ;
	} elseif ($operator === '%') {
		if ($num == 0) {
			return "You tried to modulus by 0. Skipped this argument. \n";
		}
		return ;
	} elseif ($operator === '2') {
		return "ERROR: Only works with 2 arguments.\n";
	}else {
		return "ERROR: All arguments must be numbers. You passed " . $num . "\n";
	}
}

function modulus() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$modulus = 0;
	for ($i = 0; $i < $numArgs; $i++) { 
		if ($numArgs < 2) {
			return error('2');
		}
		if (is_numeric($numList[$i]) != TRUE) {
	        return error('', $numList[$i]);
	    }
	    if ($numList[$i] == 0) {
	    	echo error('%', $numList[$i]);
	    	continue;
	    }
		if ($i == 0) {
			$modulus = $numList[$i];
		} else {
			$modulus %= $numList[$i];
		}
	}
	return $modulus . "\n";
}

function add() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$add = 0;
	for ($i = 0; $i < $numArgs; $i++) { 
		if (is_numeric($numList[$i]) != TRUE) {
	        return error('', $numList[$i]);
	    }
		if ($i == 0) {
			$add = $numList[$i];
		} else {
			$add += $numList[$i];
		}
	}
	return $add . "\n";
}

function subtract() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$subtract = 0;
	for ($i = 0; $i < $numArgs; $i++) {
		if (is_numeric($numList[$i]) != TRUE) {
	        return error('', $numList[$i]);
	    }
		if ($i == 0) {
			$subtract = $numList[$i];
		} else {
			$subtract -= $numList[$i];
		}
	}
	return $subtract . "\n";
}

function mulitply() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$mulitply = 0;
	for ($i = 0; $i < $numArgs; $i++) {
		if (is_numeric($numList[$i]) != TRUE) {
	        return error('', $numList[$i]);
	    }
		if ($i == 0) {
			$mulitply = $numList[$i];
		} else {
			$mulitply *= $numList[$i];
		}
	}
	return $mulitply . "\n";
}

function divide() {
	$numArgs = func_num_args();
	$numList = func_get_args();
	$divide = 0;
	for ($i = 0; $i < $numArgs; $i++) { 
		if (is_numeric($numList[$i]) != TRUE) {
	        return error('', $numList[$i]);
	    }
	    if ($numList[$i] == 0) {
	    	echo error('/', $numList[$i]);;
	    	continue;
	    }
		if ($i == 0) {
			$divide = $numList[$i];
		} else {
			$divide /= $numList[$i];
		}
	}
	return $divide . "\n";
}

$first = 10;
$second = 2;


echo modulus($first, $second);
echo add($first, $second, 13, 10, 8);
echo subtract($first, $second, 13, 10, 8);
echo mulitply($first, $second, 13, 10, 8);
echo divide($first, $second, 13, 10, 8);

?>