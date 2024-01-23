<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    function splitNum($num)
    {
        $arr = [];
        $n   = 0;
        while ($num) {
            $arr[] = $num % 10;
            $num   = floor($num / 10);
            ++$n;
        }

        sort($arr);
        $ans  = 0;
        $last = 0;
        $pow  = 0;
        for ($i = $n - 1; $i >= 0; $i -= 2) {
            if ($i > 0) {
                $temp = $arr[$i] + $arr[$i - 1] + $last;
            } else {
                $temp = $arr[$i] + $last;
            }
            $ans = $temp % 10 * pow(10, $pow) + $ans;
            ++$pow;
            $last = intval(floor($temp / 10));
        }
        if ($last !== 0) {
            $ans = $last * pow(10, $pow) + $ans;
        }

        return $ans;
    }
}