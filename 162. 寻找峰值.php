<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums)
    {
        $left  = 0;
        $right = count($nums) - 1;

        while ($left <= $right) {
            $mid = floor(($right - $left) / 2 + $left);
            if ($mid != $left && $mid != $right) {
                if ($nums[$mid] > $nums[$mid - 1] && $nums[$mid] > $nums[$mid + 1]) {
                    return $mid;
                } elseif ($nums[$mid] <= $nums[$mid - 1]) {
                    $right = $mid - 1;
                } elseif ($nums[$mid] <= $nums[$mid + 1]) {
                    $left = $mid + 1;
                }
            } elseif ($mid == $left) {
                if ($nums[$mid] > $nums[$mid + 1]) {
                    return $mid;
                } else {
                    $left = $mid + 1;
                }
            } elseif ($mid == $right) {
                if ($nums[$mid] > $nums[$mid - 1]) {
                    return $mid;
                } else {
                    $right = $mid - 1;
                }
            }
        }

        return -1;
    }
}