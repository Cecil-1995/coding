<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer[][]
     */
    function kSmallestPairs($nums1, $nums2, $k)
    {
        $ans        = [];
        $i          = 0;
        $j          = 0;
        $nums1Count = count($nums1);
        $nums2Count = count($nums2);
        while ($i < $nums1Count && $j < $nums2Count) {



            if (count($ans) === $k) {
                break;
            }
        }

        return $ans;
    }
}