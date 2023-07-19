<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k)
    {
        $k   %= count($nums);
        $ans = [];

        for ($i = count($nums) - $k; $i < count($nums); ++$i) {
            $ans[] = $nums[$i];
        }
        for ($i = 0; $i < count($nums) - $k; ++$i) {
            $ans[] = $nums[$i];
        }

        $nums = $ans;

        return null;
    }

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate2(&$nums, $k)
    {
        $k       %= count($nums);
        $reverse = function (&$nums, $start, $end){
            while ($start < $end) {
                $temp           = $nums[$end - 1];
                $nums[$end - 1] = $nums[$start];
                $nums[$start]   = $temp;
                ++$start;
                --$end;
            }
        };

        $reverse($nums, 0, count($nums));
        $reverse($nums, 0, $k);
        $reverse($nums, $k, count($nums));

        return null;
    }
}