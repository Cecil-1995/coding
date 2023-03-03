<?php

class Solution
{
    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    function coinChange($coins, $amount)
    {
        $dp[0] = 0;

        for ($i = 1; $i <= $amount; ++$i) {
            $dp[$i] = $amount + 1;
            foreach ($coins as $coin) {
                if ($i-$coin < 0) {
                    continue;
                }
                $dp[$i] = min($dp[$i], 1+$dp[$i-$coin]);
            }
        }

        return $dp[$amount] === $amount + 1 ? -1 : $dp[$amount];
    }
}