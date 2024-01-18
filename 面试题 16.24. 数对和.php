<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function pairSums($nums, $target)
    {
        $ans = [];
        sort($nums);
        $left  = 0;
        $right = count($nums) - 1;
        while ($left < $right) {
            $result = $nums[$left] + $nums[$right];
            if ($result > $target) {
                --$right;
            } elseif ($result < $target) {
                ++$left;
            } else {
                $ans[] = [$nums[$left], $nums[$right]];
                ++$left;
                --$right;
            }
        }

        return $ans;
    }
}