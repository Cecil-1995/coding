<?php

class Solution
{

    /**
     * @param Integer $target
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen($target, $nums)
    {
        $left = 0;
        $ans  = 0;
        $sum  = 0;

        foreach ($nums as $right => $num) {
            $sum += $num;
            while ($sum >= $target) {
                $ans = $ans === 0 ? $right - $left + 1 : min($ans, $right - $left + 1);
                $sum -= $nums[$left++];
            }
        }

        return $ans;
    }
}