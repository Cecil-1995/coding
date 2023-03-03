<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums)
    {
        /**
         * $dp[i][0] 偷
         * $dp[i][0] 不偷
         */
        if (!count($nums)) {
            return 0;
        }

        $dp[0][0] = $nums[0];
        $dp[0][1] = 0;

        for ($i = 1; $i < count($nums); ++$i) {
            $dp[$i][0] = $dp[$i - 1][1] + $nums[$i];
            $dp[$i][1] = max($dp[$i - 1][0], $dp[$i - 1][1]);
        }

        return max($dp[count($nums) - 1][0], $dp[count($nums) - 1][1]);
    }
}