<?php

class Solution
{

    /**
     * @param Integer[] $cost
     * @return Integer
     */
    function minCostClimbingStairs($cost)
    {
        $n = count($cost);
        if ($n === 0) {
            return 0;
        } elseif ($n === 1) {
            return $cost[0];
        }

        $dp[0][0] = 0;  // 不选择当前这个
        $dp[1][0] = $cost[0];   // 选择当前这个
        $dp[0][1] = $cost[0];  // 不选择当前这个
        $dp[1][1] = $cost[1];   // 选择当前这个

        for ($i = 2; $i < $n; ++$i) {
            $dp[0][$i] = $dp[1][$i - 1];
            $dp[1][$i] = min($dp[0][$i - 1], $dp[1][$i - 1]) + $cost[$i];
        }

        return min($dp[0][$n - 1], $dp[1][$n - 1]);
    }
}