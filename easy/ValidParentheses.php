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
	foreach ($string2 as $key => $value) {
		if (array_search($value, $left)) {  //如果是左括号则入栈
			$stack[] = $value;
		}
		if (array_search($value, $right)) {
			if (!count($stack)) { // 栈空
				echo "无效！";die;
			}
			$last = end($stack);  //取最后一个数组
			if ($match[$value] == $last) {  //如果最后一个左括号与该右括号搭配则去掉最后一个
				array_pop($stack);
			} else {
				echo "无效！";die;
			}
		}

	}
	echo "有效！";

	function p($arr) {
		
	}