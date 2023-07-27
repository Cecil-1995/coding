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

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function increasingTriplet2($nums)
    {
        $len = count($nums);
        if ($len < 3) {
            return false;
        }

        $first  = $nums[0];
        $second = PHP_INT_MAX;
        for ($i = 1; $i < $len; ++$i) {
            if ($nums[$i] <= $first) {
                $first = $nums[$i];
            } elseif ($nums[$i] <= $second) {
                $second = $nums[$i];
            } else {
                return true;
            }
        }

        return false;
    }
}