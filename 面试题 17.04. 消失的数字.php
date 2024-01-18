<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums)
    {
        $n = count($nums);

        return ($n * ($n + 1)) / 2 - array_sum($nums);
    }
}