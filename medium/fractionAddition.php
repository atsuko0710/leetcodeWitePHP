<?php
/**
 * 给定一个表示分数加减运算表达式的字符串，你需要返回一个字符串形式的计算结果。 这个结果应该是不可约分的分数，即最简分数。 如果最终结果是一个整数，例如 2，你需要将它转换成分数形式，其分母为 1。所以在上述例子中, 2 应该被转换为 2/1。
 * 
 * 输入:"-1/2+1/2"
 * 输出: "0/1"
 */
class Solution {

    /**
     * @param String $expression
     * @return String
     */
    function fractionAddition($expression) {
        $newString = str_replace('-', '+-', $expression);
        $expArray = explode('+', $newString);
        $fraction = [];
        $mol = [];  // 分子
        $den = [];  // 分母
        foreach ($expArray as $value) {
            if (!empty($value)) {
                $fraction[] = $value;
                $tmp = explode('/', $value);
                $mol[] = $tmp[0];
                $den[] = $tmp[1];
            }
        }
        $len = count($fraction) - 1;
        
        foreach ($fraction as $key => $value) {
            if ($key >= $len) {
                break;
            }
            $multiple = $this->min_multiple($den[$key], $den[$key + 1]);

            $first = (int)$mol[$key] * ($multiple / $den[$key]);
            $last = (int)$mol[$key + 1] * ($multiple / $den[$key + 1]);
            
            var_dump($first, $last);
            
            $fraction[$key + 1] = ($first + $last) . '/' . $den[$key + 1];
            $mol[$key + 1] = ($first + $last);
            $den[$key + 1] = $multiple;
            // var_dump($fraction[$key + 1], $mol[$key + 1], $den[$key + 1]);
        }
        var_dump($fraction[$len]);die;
    }

    function simplify(){

    }

    function min_multiple($a, $b)
    {    
        $i = 1;
        while (true) {
            $max = max($a, $b);            
            $cal = $max * $i;
            if ($cal % $a == 0 && $cal % $b == 0) {
                return $cal;
            }
            $i ++;
        }
    }
}

$solution = new Solution();
$solution->fractionAddition('-1/2+1/2+1/3');
// var_dump($solution->min_multiple(15,20));
// echo ((int)'-1' + (int)'1');