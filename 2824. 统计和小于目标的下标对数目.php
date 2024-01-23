<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function countPairs($nums, $target)
    {
        sort($nums);
        $left  = 0;
        $right = count($nums) - 1;
        $ans   = 0;
        while ($left < $right) {
            if ($nums[$left] + $nums[$right] >= $target) {
                --$right;
            } else {
                $ans += $right - $left;
                ++$left;
            }
        }

        return $ans;
    }
}