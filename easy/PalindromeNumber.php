<?php
	
/**
 * Determine whether an integer is a palindrome. Do this without extra space.
 * 确定整数是否是回文。做这个没有额外的空间。
 */
	
	include_once("ReverseInteger.php");

	$i = 121;
	if ($i <= 0) {
		echo "负数和0不为回文";die;
	}
	$reverse = reverse($i);
	if ($i == $reverse) {
		echo "该数字为回文";
	} else {
		echo "该数字不为回文";
	}
