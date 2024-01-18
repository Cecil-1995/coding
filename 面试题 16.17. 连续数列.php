<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums)
    {
        $n   = count($nums);
        $ans = $nums[0];
        $max = $nums[0];
        for ($i = 1; $i < $n; ++$i) {
            $ans = max($ans + $nums[$i], $nums[$i]);
            $max = max($max, $ans);
        }

        return $max;
    }
}