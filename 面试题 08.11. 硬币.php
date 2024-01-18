<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function waysToChange($n)
    {
        $dp[0] = 1;
        $coins = [1, 5, 10, 25];
        foreach ($coins as $coin) {
            for ($i = $coin; $i <= $n; ++$i) {
                if (!isset($dp[$i])) {
                    $dp[$i] = 0;
                }
                $dp[$i] = ($dp[$i] + $dp[$i - $coin]) % 1000000007;
            }
        }

        return $dp[$n];
    }
}