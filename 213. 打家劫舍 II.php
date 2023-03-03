<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums)
    {
        if (!count($nums)) {
            return 0;
        } elseif (count($nums) == 1) {
            return $nums[0];
        } elseif (count($nums) === 2) {
            return max($nums[0], $nums[1]);
        } else {
            return max($this->robRange(array_slice($nums, 0, count($nums)-1)), $this->robRange(array_slice($nums, 1)));
        }
    }

    function robRange($nums)
    {
        $dp[0] = $nums[0];
        $dp[1] = max($nums[0], $nums[1]);

        for ($i = 2; $i < count($nums); ++$i) {
            $dp[$i] = max($dp[$i - 1], $dp[$i - 2] + $nums[$i]);
        }

        return $dp[count($nums) - 1];
    }
}