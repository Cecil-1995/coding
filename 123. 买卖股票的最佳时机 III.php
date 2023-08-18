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
         * $dp[$i][$k][0] 第$i天最大交易限制次数为k，当前不持有的收益
         * $dp[$i][$k][1] 第$i天最大交易限制次数为k，当前持有的收益
         */
        $dp    = [];
        $max_k = 2;
        $count = count($prices);

        for ($i = 0; $i < $count; ++$i) {
            $dp[$i][0][0] = 0;
            for ($k = $max_k; $k > 0; --$k) {
                if ($i === 0) {
                    $dp[$i][$k][0] = 0;
                    $dp[$i][$k][1] = -$prices[$i];
                    continue;
                }

                $dp[$i][$k][0] = max($dp[$i - 1][$k][0], $dp[$i - 1][$k][1] + $prices[$i]);
                $dp[$i][$k][1] = max($dp[$i - 1][$k][1], $dp[$i - 1][$k - 1][0] - $prices[$i]);
            }
        }

        return $dp[$count - 1][$max_k][0];
    }
}

var_dump((new Solution())->maxProfit([1]));