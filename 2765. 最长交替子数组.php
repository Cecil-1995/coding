<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function alternatingSubarray($nums)
    {
        $tempAns = 1;
        $ans     = 1;
        $n       = count($nums);
        $flag    = -1;
        for ($i = 1; $i < $n; ++$i) {
            $diff = $nums[$i] - $nums[$i - 1];
            if ($flag === 1 && $diff === -1 || $flag === -1 && $diff === 1) {
                ++$tempAns;
                $ans  = max($ans, $tempAns);
                $flag = $diff;
            } elseif ($diff === 1) {
                $flag    = 1;
                $tempAns = 2;
            } else {
                $flag    = -1;
                $tempAns = 1;
            }
        }

        return $ans === 1 ? -1 : $ans;
    }
}