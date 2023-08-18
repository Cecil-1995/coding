<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function integerBreak($n)
    {
        $dp[0] = $dp[1] = 1;

        for ($i = 2; $i <= $n; ++$i) {
            for ($j = 1; $j <= $i - 1; ++$j) {
                $dp[$i] = max($dp[$i], $j * ($i - $j), $j * $dp[$i - $j]);
            }
        }

        return $dp[$n];
    }
}