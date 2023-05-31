<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minIncrementForUnique($nums)
    {
        sort($nums);
        $count = 0;

        for ($i = 1, $n = count($nums); $i < $n; ++$i) {
            if ($nums[$i] <= $nums[$i - 1]) {
                $count    += $nums[$i - 1] - $nums[$i] + 1;
                $nums[$i] = $nums[$i - 1] + 1;
            }
        }

        return $count;
    }
}