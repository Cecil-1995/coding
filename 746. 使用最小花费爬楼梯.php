<?php

class Solution
{

    /**
     * @param Integer[] $cost
     * @return Integer
     */
    function minCostClimbingStairs($cost)
    {
        $n        = count($cost);
        $dp[0][0] = 0;
        $dp[1][0] = $cost[0];
        $dp[0][1] = $dp[1][0];
        $dp[1][1] = $cost[1];

        for ($i = 2; $i < $n; ++$i) {
            $dp[0][$i] = $dp[1][$i - 1];
            $dp[1][$i] = min($dp[0][$i - 1], $dp[1][$i - 1], $dp[1][$i - 2]) + $cost[$i];
        }

        return min($dp[0][$n - 1], $dp[1][$n - 1]);
    }
}