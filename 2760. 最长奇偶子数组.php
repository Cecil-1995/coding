<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $threshold
     * @return Integer
     */
    function longestAlternatingSubarray($nums, $threshold)
    {
        $n    = count($nums);
        $left = 0;
        $ans  = 0;
        while ($left < $n) {
            if ($nums[$left] % 2 === 0 && $nums[$left] <= $threshold) {
                $right = $left + 1;
                while ($right < $n) {
                    if ($nums[$right] % 2 !== $nums[$right - 1] % 2 && $nums[$right] <= $threshold) {
                        ++$right;
                    } else {
                        break;
                    }
                }
                $ans  = max($right - $left, $ans);
                $left = $right;
            } else {
                ++$left;
            }
        }

        return $ans;
    }
}