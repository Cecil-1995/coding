<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function massage($nums)
    {
        $n = count($nums);
        if ($n === 0) {
            return 0;
        } elseif ($n === 1) {
            return $nums[0];
        } elseif ($n === 2) {
            return max($nums[0], $nums[1]);
        }

        $dp_0 = $nums[0];
        $dp_1 = max($nums[0], $nums[1]);
        for ($i = 2; $i < $n; ++$i) {
            $temp = $dp_0;
            $dp_0 = $dp_1;
            $dp_1 = max($dp_0, $temp + $nums[$i]);
        }

        return $dp_1;
    }
}