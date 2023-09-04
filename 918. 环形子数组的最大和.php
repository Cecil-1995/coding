<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubarraySumCircular($nums)
    {
        $currentMax = 0;
        $currentMin = 0;
        $max        = $nums[0];
        $min        = $nums[0];
        $total      = 0;

        foreach ($nums as $num) {
            $currentMax = max($currentMax + $num, $num);
            $max        = max($max, $currentMax);

            $currentMin = min($currentMin + $num, $num);
            $min        = min($min, $currentMin);

            $total += $num;
        }

        return $max < 0 ? $max : max($max, $total - $min);
    }
}