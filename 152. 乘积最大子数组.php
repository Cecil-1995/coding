<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums)
    {
        $n = count($nums);
        if ($n === 0) {
            return 0;
        }

        $dpMax[0] = $nums[0];
        $dpMin[0] = $nums[0];
        $max      = $nums[0];
        for ($i = 1; $i < $n; ++$i) {
            $dpMax[$i] = max($dpMax[$i - 1] * $nums[$i], $dpMin[$i - 1] * $nums[$i], $nums[$i]);
            $dpMin[$i] = min($dpMax[$i - 1] * $nums[$i], $dpMin[$i - 1] * $nums[$i], $nums[$i]);

            $max = max($max, $dpMax[$i]);
        }

        return $max;
    }
}