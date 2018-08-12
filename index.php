<?php

function addition($num1, $num2) {
	
	// определяем большее и переворачиваем
	if (strlen($num1) > strlen($num2)) {
		$max = strrev($num1); $min = strrev($num2);
	} else {
		$max = strrev($num2); $min = strrev($num1);
	}

	//var_dump(['max, min', $max, $min]);
	
	// считаем "столбиком"
	$summ = '';
	$transfer = 0;
	for($i = 0; $i < strlen($max); $i++) {
		//var_dump([$max[$i], $min[$i]]);
		$step = ($max[$i]) + ($min[$i]?:0) + $transfer;
		//var_dump($transfer);
		//var_dump($step);
		$transfer = 0;
		if ($step >= 10) {
			$step -= 10;
			$transfer = 1;
		}
		$summ = $step.$summ;
	}
	
	// последний десяток
	if ($transfer > 0) {
		$summ = '1'.$summ;
	}
	
	return $summ;
}

$num1 = '99999999';
$num2 = '9999';

var_dump([$num1, $num2]);
var_dump($num1+$num2);
var_dump(addition($num1, $num2));

$num1 = '1234567890';
$num2 = '1234564332';

var_dump([$num1, $num2]);
var_dump($num1+$num2);
var_dump(addition($num1, $num2));

$num1 = '9999999999999999999999999999999999999';
$num2 = '9999';

var_dump([$num1, $num2]);
var_dump($num1+$num2);
var_dump(addition($num1, $num2));