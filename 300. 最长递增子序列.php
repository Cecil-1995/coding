<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums)
    {
        $n        = count($nums);
        $dp[0] = 1;

        for ($i = 1; $i < $n; ++$i) {
            $dp[$i] = $nums[$i] > $nums[$i - 1] ? $dp[$i - 1] + 1 : $dp[$i - 1];
        }

        return $dp[0][$n - 1];
    }
}