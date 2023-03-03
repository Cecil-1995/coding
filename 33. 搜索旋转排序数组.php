<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target)
    {
        $left  = 0;
        $right = count($nums) - 1;


        while ($left <= $right) {
            $middle = ceil($left + ($right - $left) / 2);
            if ($target === $nums[$middle]) {
                return intval($middle);
            } elseif ($nums[0] <= $nums[$middle]) {
                // 左边是有序的
                if ($target < $nums[$middle] && $nums[0] <= $target) {
                    $right = $middle - 1;
                } else {
                    $left = $middle + 1;
                }
            } else {
                // 右边是有序的
                if ($target > $nums[$middle] && $nums[count($nums) - 1] >= $target) {
                    $left = $middle + 1;
                } else {
                    $right = $middle - 1;
                }
            }
        }

        return -1;
    }
}

var_dump((new Solution())->search([4, 5, 6, 7, 0, 1, 2], 0));