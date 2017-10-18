<?php

/**
 * Write a function to find the longest common prefix string amongst an array of strings.
 * 编写一个函数来查找字符串数组中最长的公共前缀字符串。
 */

	$string = ["afsa130000000","afsa13443333","afsa16788","afsa15568"];

	function longest($string) {
		$count = count($string);
		$result = '';

		// 当数组只有一个元素的情况
		if ($count == 1) {
			$result = $string[0];
		}

		$minSize = strlen($string[0]);
		$minIndex = 0;

		// 获取数组中最短的字符串和下标
		for ($i=1; $i < $count; $i++) { 
			$nowlen = strlen($string[$i]);
			if ($nowlen < $minSize) {
				$minSize = $nowlen;
				$minIndex = $i;
			}
		}

		for ($i=$minSize; $i > 0; $i--) { 
			$result = substr($string[$minIndex],0,$i);  //截取字符串
			for ($j=0; $j < $count; $j++) { 
				if ($j == $minIndex) {  //若比较的和最小值是同一个则不用比较
					continue;
				}
				$temp = substr($string[$j], 0, $i);
				if ($result != $temp) {
					break;
				}
			}
			if ($j == $count) {
				return $result;
			}
		}
		return false;
	}

	echo longest($string);