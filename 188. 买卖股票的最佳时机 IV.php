<?php

class Solution
{

    /**
     * @param Integer $k
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($k, $prices)
    {
        $dp = [];

        for ($i = 0, $n = count($prices); $i < $n; ++$i) {
            $dp[$i][0][0] = 0;
            for ($j = $k; $j > 0; --$j) {
                if ($i === 0) {
                    $dp[$i][$j][0] = 0;
                    $dp[$i][$j][1] = -$prices[$i];
                    continue;
                }
                $dp[$i][$j][0] = max($dp[$i - 1][$j][0], $dp[$i - 1][$j][1] + $prices[$i]);
                $dp[$i][$j][1] = max($dp[$i - 1][$j][1], $dp[$i - 1][$j - 1][0] - $prices[$i]);
            }
        }

        return $dp[$n - 1][$k][0];
    }
}

var_dump((new Solution())->maxProfit(2, [1]));