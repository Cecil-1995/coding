<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf2($nums)
    {
        $count = count($nums);
        if ($count === 0) {
            return [];
        }
        $before[0]         = $nums[0];
        $after[$count - 1] = $nums[$count - 1];
        $result            = [];

        for ($i = 1; $i < $count; ++$i) {
            $before[$i] = $before[$i - 1] * $nums[$i];
        }
        for ($i = $count - 2; $i >= 0; --$i) {
            $after[$i] = $after[$i + 1] * $nums[$i];
        }

        for ($i = 0; $i < $count; ++$i) {
            $result[$i] = ($before[$i - 1] ?? 1) * ($after[$i + 1] ?? 1);
        }

        return $result;
    }

    function productExceptSelf($nums)
    {
        $count     = count($nums);
        $result[0] = 1;
        for ($i = 1; $i < $count; ++$i) {
            $result[$i] = $result[$i - 1] * $nums[$i - 1];
        }

        $r = 1;
        for ($i = $count - 1; $i >= 0; --$i) {
            $result[$i] = $result[$i] * $r;
            $r          *= $nums[$i];
        }

        return $result;
    }
}