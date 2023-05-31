<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestSubarray2($nums)
    {
        $n           = count($nums);
        $begin[0]    = $nums[0] ? 1 : 0;
        $end[$n - 1] = $nums[$n - 1] ? 1 : 0;

        for ($i = 1; $i < $n; ++$i) {
            $begin[$i] = $nums[$i] ? $begin[$i - 1] + 1 : 0;
        }
        for ($i = $n - 2; $i >= 0; --$i) {
            $end[$i] = $nums[$i] ? $end[$i + 1] + 1 : 0;
        }

        $ans = 0;
        for ($i = 0; $i < $n; ++$i) {
            $left  = $i === 0 ? 0 : $begin[$i - 1];
            $right = $i === $n - 1 ? 0 : $end[$i + 1];

            $ans = max($ans, $left + $right);
        }

        return $ans;
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestSubarray($nums)
    {
        $n = count($nums);
        $k = 1;

        $left = $right = 0;
        $ans  = 0;
        $zero = 0;
        while ($right < $n) {
            if ($nums[$right] === 0) {
                ++$zero;
                while ($zero > $k) {
                    if ($nums[$left] === 0) {
                        --$zero;
                    }
                    ++$left;
                }
            }
            $ans = max($ans, $right++ - $left);
        }

        return $ans;
    }
}