<?php

/**
 * Given a string containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.
 * The brackets must close in the correct order, "()" and "()[]{}" are all valid but "(]" and "([)]" are not.
 * 给定一个仅包含字符'（'，'）'，'{'，'}'，'['和']'的字符串，确定输入字符串是否有效。 
 * 括号必须以正确的顺序关闭，“（）”和“（）[] {}”都是有效的，但“（]”和“（[）]”不是。
 */

	$left = [
		1 => '(',
		2 => '{',
		3 => '[',
	];
	$right = [
		1 => ')',
		2 => '}',
		3 => ']',
	];
	$match = [
		')' => '(',
		'}' => '{',
		']' => '[',
	];

	$string1 = '((([{}])))';
	$string2 = '(()[([{}])))';
	$stack = [];
	$str = str_split($string1);

	function vaild($str) {
		global $left,$right,$match;
		foreach ($str as $key => $value) {
			if (array_search($value, $left)) {  //如果是左括号则入栈
				$stack[] = $value;
			}
			if (array_search($value, $right)) {
				if (!count($stack)) {  //栈空则无效
					return false;
				}
				$last = end($stack); // 取栈中最后一个字符
				if ($match[$value] != $last) {  // 最后一个字符与右括号不匹配
					return false;
				} else {
					array_pop($stack);  // 出栈
				}
			}
		}
		return true;
	}
	if (vaild($str)) {
		echo "有效！";
	} else {
		echo "无效！";
	}

	