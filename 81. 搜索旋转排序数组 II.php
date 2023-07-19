<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Boolean
     */
    function search($nums, $target)
    {
        $left  = 0;
        $right = count($nums) - 1;

        while ($left <= $right) {
            $mid = floor(($right - $left) / 2) + $left;

            if ($nums[$mid] === $target) {
                return true;
            }
            if ($nums[$mid] === $nums[$left]) {
                ++$left;
                continue;
            }

            if ($nums[$left] < $nums[$mid]) {
                // 左边有序
                if ($nums[$left] <= $target && $target <= $nums[$mid - 1]) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            } else {
                // 右边有序
                if ($nums[$mid + 1] <= $target && $target <= $nums[$right]) {
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }
        }

        return false;
    }
}