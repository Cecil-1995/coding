<?php

class Solution
{

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeightII($stones)
    {
        $sum = floor(array_sum($stones) / 2);
        $n   = count($stones);
        $dp  = [];

        $dp[0][0] = true;
        for ($j = 1; $j <= $sum; ++$j) {
            $dp[0][$j] = false;
        }

        $ans = 0;
        for ($i = 1; $i <= $n; ++$i) {
            for ($j = 0; $j <= $sum; ++$j) {
                if ($j < $stones[$i - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j];
                } else {
                    $dp[$i][$j] = $dp[$i - 1][$j] || $dp[$i - 1][$j - $stones[$i - 1]];
                }
                if ($i === $n && $dp[$i][$j]) {
                    $ans = max($j, $ans);
                }
            }
        }

        return array_sum($stones) - 2 * $ans;
    }
}