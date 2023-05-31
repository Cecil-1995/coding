<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate($nums, $k)
    {
        $n = count($nums);
        if ($n < 2 || $k == 0) {
            return false;
        }
        $start = 0;
        $end   = 1;

        while ($start != $n && $end != $n) {
            while ($end - $start > $k) {
                ++$start;
                if ($nums[$start] == $nums[$end] && $start != $end) {
                    return true;
                }
            }
            ++$end;
            if ($nums[$start] == $nums[$end] && $start != $end) {
                return true;
            }
        }

        return false;
    }
}