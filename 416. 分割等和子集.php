<?php

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canPartition($nums)
    {
        $sum = array_sum($nums);
        if ($sum % 2) {
            return false;
        }
        $sum = $sum / 2;
        $n   = count($nums);

        for ($i = 0; $i < $n; ++$i) {
            $dp[$i][0] = true;
        }
        for ($j = 0; $j < $sum; ++$j) {
            $dp[0][$j] = false;
        }

        for ($i = 1; $i <= $n; ++$i) {
            for ($j = 1; $j <= $sum; ++$j) {
                $dp[$i][$j] = $dp[$i - 1][$j] || $dp[$i - 1][$j - $nums[$i - 1]];
            }
        }

        return $dp[$n][$sum];
    }
}