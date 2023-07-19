<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumUniqueSubarray($nums)
    {
        $ans   = 0;
        $start = 0;
        $sum   = 0;
        $map   = [];

        foreach ($nums as $end => $num) {
            if (!isset($map[$num])) {
                $map[$num] = true;
                $sum       += $num;
                $ans       = max($ans, $sum);
            } else {
                while ($nums[$start++] !== $num) {
                    $sum -= $nums[$start - 1];
                    unset($map[$nums[$start - 1]]);
                }
            }
        }

        return $ans;
    }
}