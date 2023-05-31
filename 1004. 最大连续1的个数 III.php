<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function longestOnes($nums, $k)
    {
        $n = count($nums);

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
            $ans = max($ans, ++$right - $left);
        }

        return $ans;
    }
}