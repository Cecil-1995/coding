<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @param Integer $fee
     * @return Integer
     */
    function maxProfit($prices, $fee)
    {
        $n        = count($prices);
        $dp[0][0] = 0;
        $dp[1][0] = -$prices[0];
        for ($i = 1; $i < $n; ++$i) {
            $dp[0][$i] = max($dp[0][$i - 1], $dp[1][$i - 1] + $prices[$i] - $fee);
            $dp[1][$i] = max($dp[1][$i - 1], $dp[0][$i - 1] - $prices[$i]);
        }

        return $dp[0][$n - 1];
    }
}