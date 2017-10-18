<?php 

/**
 * Given a roman numeral, convert it to an integer.
 * Input is guaranteed to be within the range from 1 to 3999.
 * 给定一个罗马数字，将其转换为整数。 
 * 输入保证在1到3999之间。
 */

	$tagVal = [  //罗马与整数的关系
		"I" => 1,
		"V" => 5,
		"X" => 10,
		"L" => 50,
		"C" => 100,
		"D" => 500,
		"M" => 1000
	];

	$string = "CXCIX";
	function rotoint($string) {
		global $tagVal;
		$len = strlen($string);
		$int = 0;
		for ($i=0; $i < $len; $i++) { 
			if ($tagVal[$string[$i + 1]] < $tagVal[$string[$i]] || (($i + 1) >= len)) {
				$int += $tagVal[$string[$i]];
			} else {
				$int -= $tagVal[$string[$i]];
			}
		}
		return $int;
	}
	echo rotoint($string);