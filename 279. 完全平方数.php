<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function numSquares($n)
    {
        $dp[0] = 0;

        for ($i = 1; $i <= $n; ++$i) {
            $dp[$i] = PHP_INT_MAX;
            for ($j = 1; $j * $j <= $i; ++$j) {
                $dp[$i] = min($dp[$i], $dp[$i - $j * $j] + 1);
            }
        }

        return $dp[$n];
    }
}