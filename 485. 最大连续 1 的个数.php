<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxConsecutiveOnes($nums)
    {
        $max        = 0;
        $currentMax = 0;

        foreach ($nums as $num) {
            if ($num === 1) {
                ++$currentMax;
                $max = max($max, $currentMax);
            } else {
                $currentMax = 0;
            }
        }

        return $max;
    }
}