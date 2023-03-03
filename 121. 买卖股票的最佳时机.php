<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices)
    {
        $dp       = [];
        $dp[0][0] = -$prices[0];    // 有
        $dp[0][1] = 0;  // 无

        for ($i = 1; $i < count($prices); ++$i) {
            $dp[$i][0] = max($dp[$i - 1][0], -$prices[$i]);
            $dp[$i][1] = max($dp[$i - 1][1], $dp[$i - 1][0] + $prices[$i]);
        }

        return $dp[count($prices) - 1][1];
    }
}

var_dump((new Solution())->maxProfit([7, 1, 5, 3, 6, 4]));
