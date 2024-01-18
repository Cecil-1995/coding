<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums)
    {
        $n = count($nums);

        for ($i = 0; $i < $n;) {
            if ($i !== $nums[$i] && $nums[$i] !== $nums[$nums[$i]]) {
                $temp        = $nums[$i];
                $nums[$i]    = $nums[$nums[$i]];
                $nums[$temp] = $temp;
            } else {
                ++$i;
            }
        }

        for ($i = 1; $i < $n; ++$i) {
            if ($nums[$i] === $i) {
                continue;
            } else {
                return $i;
            }
        }

        return $n === $nums[0] ? $n + 1 : $n;
    }
}