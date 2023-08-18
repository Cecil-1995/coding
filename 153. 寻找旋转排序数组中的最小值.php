<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums)
    {
        $left  = 0;
        $right = count($nums) - 1;

        while ($left <= $right) {
            if (abs($left - $right) <= 1) {
                return min($nums[$left], $nums[$right]);
            }
            $mid = floor(($right - $left) / 2 + $left);

            if ($nums[$left] < $nums[$mid] && $nums[$right] > $nums[$mid]) {
                return $nums[$left];
            } elseif ($nums[$left] < $nums[$mid]) {
                // 左边是有序的
                $left = $mid;
            } else {
                // 右边是有序的
                $right = $mid;
            }
        }
    }
}