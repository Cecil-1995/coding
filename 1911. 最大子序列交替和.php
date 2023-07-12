<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxAlternatingSum($nums)
    {
        $odd  = 0;
        $even = $nums[0];

        for ($i = 1, $count = count($nums); $i < $count; ++$i) {
            $o    = $odd;
            $e    = $even;
            $even = max($e, $o + $nums[$i]);
            $odd  = max($o, $e - $nums[$i]);
        }

        return $even;
    }
}