<?php

class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer $target
     * @return Integer
     */
    function search($arr, $target)
    {
        $left  = 0;
        $right = count($arr) - 1;

        while ($left <= $right) {
            if ($arr[$left] === $target) {
                return $left;
            }

            $middle = floor($right - ($right - $left) / 2);
            if ($arr[$left] < $arr[$middle]) {
                // 左半边有序
                if ($target <= $arr[$middle] && $arr[$left] <= $target) {
                    $right = $middle;
                } else {
                    $left = $middle + 1;
                }
            } elseif ($arr[$left] > $arr[$middle]) {
                // 右半边有序
                if ($target >= $arr[$middle] && $arr[$left] > $target) {
                    $left = $middle;
                } else {
                    $right = $middle - 1;
                }
            } else {
                ++$left;
            }
        }

        return -1;
    }
}