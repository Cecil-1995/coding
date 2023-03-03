<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        $n = count($prices);
        if ($n === 0) {
            return 0;
        }
        $dp[0][0]  = 0;
        $dp[-1][0] = 0;
        $dp[0][1]  = -$prices[0];

        for ($i = 1; $i < $n; ++$i) {
            // 没有股票 昨天也没有 或者 昨天有今天卖了
            $dp[$i][0] = max($dp[$i - 1][0], $dp[$i - 1][1] + $prices[$i]);

            // 有股票 昨天有 或者 昨天没有今天买的（今天能买昨天就一定不能有交易就是 前天也没有）
            $dp[$i][1] = max($dp[$i - 1][1], $dp[$i - 2][0] - $prices[$i]);
        }

        return $dp[$n - 1][0];
    }
}