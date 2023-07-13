<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        /**
         * $dp[$i][1] 第i天持有的最大收益
         * $dp[$i][0] 第i天不持有的最大收益
         * 返回 $dp[n-1][0]
         */

        $n = count($prices);
        if ($n === 0) {
            return 0;
        }
        $dp[0][1] = -$prices[0];
        $dp[0][0] = 0;

        for ($i = 1; $i < $n; ++$i) {
            $dp[$i][1] = max($dp[$i - 1][1], $dp[$i - 1][0] - $prices[$i]);
            $dp[$i][0] = max($dp[$i - 1][0], $dp[$i - 1][1] + $prices[$i]);
        }

        return $dp[$n - 1][0];
    }

    function maxProfit2($prices)
    {
        /**
         * $dp[$i][1] 第i天持有的最大收益
         * $dp[$i][0] 第i天不持有的最大收益
         * 返回 $dp[n-1][0]
         */

        $n = count($prices);
        if ($n === 0) {
            return 0;
        }
        $dp[0][1] = -$prices[0];
        $dp[0][0] = 0;

        for ($i = 1; $i < $n; ++$i) {
            $dp[$i][1] = max($dp[$i - 1][1], $dp[$i - 1][0] - $prices[$i]);
            $dp[$i][0] = max($dp[$i - 1][0], $dp[$i - 1][1] + $prices[$i]);
        }

        return $dp[$n - 1][0];
    }
}