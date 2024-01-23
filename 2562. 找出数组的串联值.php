<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findTheArrayConcVal($nums)
    {
        $ans = 0;
        while (count($nums) > 1) {
            $last  = array_pop($nums);
            $ans   += $last;
            $first = array_shift($nums);
            while ($last) {
                $first *= 10;
                $last  = floor($last / 10);
            }
            $ans += $first;
        }
        if (count($nums) === 1) {
            $ans += array_pop($nums);
        }

        return $ans;
    }
}