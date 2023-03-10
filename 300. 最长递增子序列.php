<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums)
    {
        $n = count($nums);
        if ($n === 0) {
            return 0;
        }

        for ($i = 0; $i < $n; ++$i) {
            $dp[$i] = 1;
        }
        for ($i = 0; $i < $n; ++$i) {
            for ($j = 0; $j < $i; ++$j) {
                if ($nums[$j] < $nums[$i]) {
                    $dp[$i] = max($dp[$j] + 1, $dp[$i]);
                }
            }
        }

        return max($dp);
    }
}