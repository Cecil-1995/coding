<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function minFlipsMonoIncr($s)
    {
        $len = strlen($s);
        if ($len === 0) {
            return 0;
        }
        if ($s[0] === '0') {
            $dp[0][0] = 0;
            $dp[1][0] = 1;
        } else {
            $dp[1][0] = 0;
            $dp[0][0] = 1;
        }

        for ($i = 1; $i < $len; ++$i) {
            if ($s[$i] === '0') {
                $dp[0][$i] = $dp[0][$i - 1];
                $dp[1][$i] = min($dp[0][$i - 1], $dp[1][$i - 1]) + 1;
            } else {
                $dp[1][$i] = min($dp[0][$i - 1], $dp[1][$i - 1]);
                $dp[0][$i] = $dp[0][$i - 1] + 1;
            }
        }

        return min($dp[0][$len - 1], $dp[1][$len - 1]);
    }
}