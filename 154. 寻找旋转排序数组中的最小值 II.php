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
            $mid = floor(($right - $left) / 2 + $left);

            if ($nums[$mid] < $nums[$right]) {
                $right = $mid;
            } elseif ($nums[$mid] > $nums[$right]) {
                $left = $mid + 1;
            } else {
                --$right;
            }
        }

        return $nums[$left];
    }
}

var_dump((new Solution())->findMin([1, 3, 5]));