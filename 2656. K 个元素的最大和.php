<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maximizeSum($nums, $k)
    {
        $max = max($nums);

        return (($max + $k - 1) * ($max + $k)) / 2 - (($max - 1) * $max) / 2;
    }
}