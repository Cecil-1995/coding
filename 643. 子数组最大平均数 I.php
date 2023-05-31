<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Float
     */
    function findMaxAverage($nums, $k)
    {
        $sum = 0;
        $max = PHP_INT_MIN;

        $left  = 0;
        $right = 0;
        $count = count($nums);

        while ($right - $left < $k && $right < $count) {
            $sum += $nums[$right];
            ++$right;

            if ($right - $left === $k) {
                $max = max($max, $sum);
            }
        }
        while ($right < $count) {
            $sum -= $nums[$left];
            $sum += $nums[$right];
            ++$left;
            ++$right;

            if ($right - $left === $k) {
                $max = max($max, $sum);
            }
        }

        return $max / $k;
    }
}