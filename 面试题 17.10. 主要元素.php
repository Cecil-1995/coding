<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums)
    {
        $n   = count($nums);
        $cnt = 1;
        $x   = $nums[0];
        for ($i = 1; $i < $n; ++$i) {
            if ($cnt === 0) {
                $cnt = 1;
                $x   = $nums[$i];
            } else {
                $cnt += $x === $nums[$i] ? 1 : -1;
            }
        }

        $cnt = 0;
        foreach ($nums as $num) {
            if ($num === $x) {
                ++$cnt;
                if ($cnt > floor($n / 2)) {
                    return $x;
                }
            }
        }

        return -1;
    }
}