<?php

class Solution
{

    /**
     * @param Integer $amount
     * @param Integer[] $coins
     * @return Integer
     */
    function change($amount, $coins)
    {
        for ($j = 0; $j <= $amount; ++$j) {
            $dp[0][$j] = 0;
        }
        for ($i = 0; $i <= count($coins); ++$i) {
            $dp[$i][0] = 1;
        }

        for ($i = 1; $i <= count($coins); ++$i) {
            for ($j = 1; $j <= $amount; ++$j) {
                $dp[$i][$j] = $dp[$i - 1][$j];

                if ($coins[$i - 1] <= $j) {
                    $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - $coins[$i - 1]];
                }
            }
        }

        return $dp[count($coins)][$amount];
    }
}

var_dump((new Solution())->change(5, [1, 2, 5]));