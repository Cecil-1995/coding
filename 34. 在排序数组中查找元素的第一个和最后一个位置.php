<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target)
    {
        return [$this->left_bound($nums, $target), $this->right_bound($nums, $target)];
    }

    function left_bound($nums, $target)
    {
        $left  = 0;
        $right = count($nums) - 1;

        while ($left <= $right) {
            $middle = $left + floor(($right - $left) / 2);
            if ($nums[$middle] == $target) {
                $right = $middle - 1;
            } elseif ($nums[$middle] > $target) {
                $right = $middle - 1;
            } else {
                $left = $middle + 1;
            }
        }

        if ($left > count($nums) - 1) {
            return -1;
        }

        return $nums[$left] == $target ? $left : -1;
    }

    function right_bound($nums, $target)
    {
        $left  = 0;
        $right = count($nums) - 1;

        while ($left <= $right) {
            $middle = $left + floor(($right - $left) / 2);
            if ($nums[$middle] == $target) {
                $left = $middle + 1;
            } elseif ($nums[$middle] > $target) {
                $right = $middle - 1;
            } else {
                $left = $middle + 1;
            }
        }

        if ($right < 0) {
            return -1;
        }

        return $nums[$right] == $target ? $right : -1;
    }
}