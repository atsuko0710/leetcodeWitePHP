<?php

/**
 * Reverse digits of an integer.
 * 反转数字的整数。
 */

	$i = -132;

	function reverse($i) {
		$result = 0;
		while ($i != 0) {
			$result = ($result * 10) + ($i % 10);
			$i = intval($i / 10);  //进行除法运算时取整
		}
		return $result;
	}

	// echo reverse($i);