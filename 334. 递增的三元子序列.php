<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function increasingTriplet($nums)
    {
        $len = count($nums);
        if ($len < 3) {
            return false;
        }

        $first  = $nums[0];
        $second = PHP_INT_MAX;
        for ($i = 1; $i < $len; ++$i) {
            if ($nums[$i] > $second) {
                return true;
            } elseif ($nums[$i] > $first) {
                $second = $nums[$i];
            } else {
                $first = $nums[$i];
            }
        }

        return false;
    }
}