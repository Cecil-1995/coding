<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $x
     * @return Integer
     */
    function minimumTime($nums1, $nums2, $x)
    {
        $sum1 = array_sum($nums1);
        $sum2 = array_sum($nums2);

        if ($sum2 - max($nums2) > $x) {
            return -1;
        }

        $ans = 0;
        while ($sum1 > $x) {
            $sum1 += $sum2;
        }

        return $ans;
    }
}