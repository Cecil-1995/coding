<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maxOperations($nums, $k)
    {
        $map = [];
        foreach ($nums as $num) {
            $map[$num] = isset($map[$num]) ? ++$map[$num] : 1;
        }

        $count = 0;
        foreach ($nums as $num) {
            if (isset($map[$num])) {
                --$map[$num];
                if ($map[$num] === 0) {
                    unset($map[$num]);
                }
            } else {
                continue;
            }
            if (isset($map[$k - $num])) {
                --$map[$k - $num];
                if ($map[$k - $num] === 0) {
                    unset($map[$k - $num]);
                }
                ++$count;
            }
        }

        return $count;
    }
}