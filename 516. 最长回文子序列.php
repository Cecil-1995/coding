<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindromeSubseq($s)
    {
        $len = strlen($s);
        $dp  = [];

        for ($i = $len - 1; $i >= 0; --$i) {
            $dp[$i][$i] = 1;
            for ($j = $i + 1; $j < $len; ++$j) {
                if ($s[$i] === $s[$j]) {
                    $dp[$i][$j] = ($dp[$i + 1][$j - 1] ?? 0) + 2;
                } else {
                    $dp[$i][$j] = max($dp[$i + 1][$j], $dp[$i][$j - 1]);
                }
            }
        }

        return $dp[0][$len - 1];
    }
}