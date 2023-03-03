<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraySum($nums, $k)
    {
        if (count($nums) == 0) {
            return 0;
        }

        $map    = [];
        $count  = 0;
        $pre    = 0;
        $map[0] = 1;

        for ($i = 0; $i < count($nums); ++$i) {
            $pre += $nums[$i];

            $count += ($map[$pre - $k] ?? 0);

            $map[$pre] = isset($map[$pre]) ? $map[$pre] + 1 : 1;
        }

        return $count;
    }
}