<?php

/**
 * Given an array of integers, return indices of the two numbers such that they add up to a specific target.
 * You may assume that each input would have exactly one solution, and you may not use the same element twice.
 * 给定一个整数数组，返回两个数字的索引，使它们相加到一个特定的目标。 
 * 您可以假设每个输入都只有一个解决方案，而您可能不会使用相同的元素两次。
 */
	$nums = [2,3,1,7,24,11,4,8,23];
	$target = 13;

	/**
	 * 方法 1
	 */
	function twosum($nums,$target) {
		$count = count($nums);
		for ($i=0; $i < $count; $i++) { 
			for ($j=0; $j < $count; $j++) { 
				if ($i >= $j) {  //避免输出的前面一个值比后面值大
					continue;
				}
				$total = $nums[$i] + $nums[$j];
				if ($total == $target) {
					return '['.($i + 1).'，'.($j + 1).']';
				}
			}
		}
		return false;
	}

	/**
	 * 方法2
	 */
	function twosum2($nums,$target) {
		$count = count($nums);
		for ($i=0; $i < $count; $i++) { 
			$temp = $target - $nums[$i];
			$value = array_search($temp, $nums);
			if ($value) {
				if ($value == $i) {  //避免同一值相加相等的情况
					continue;
				}
				if ($value > $i) {
					return '['.($i + 1).'，'.($value + 1).']';
				} else {
					return '['.($value + 1).'，'.($i + 1).']';
				}
			}
			return false;
		}
	}

	$a = twosum2($nums,$target);
	echo $a;