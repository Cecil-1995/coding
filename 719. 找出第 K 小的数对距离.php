<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function smallestDistancePair($nums, $k)
    {
        sort($nums);
        $n = count($nums);
        $k = $n - $k;

        $left  = 0;
        $right = $n - 1;
        while ($left < $right) {
            if ($left + 1 <= $n - 1 && $nums[$left] === $nums[$left + 1]) {
                ++$left;
            } elseif ($right - 1 >= 0 && $nums[$right] === $nums[$right - 1]) {
                --$right;
            }
        }

        return abs($nums[$left] - $nums[$right]);
    }
}