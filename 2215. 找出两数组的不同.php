<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[][]
     */
    function findDifference($nums1, $nums2)
    {
        $map1 = $map2 = [];

        foreach ($nums1 as $num) {
            if (!in_array($num, $nums2)) {
                $map1[] = $num;
            }
        }
        foreach ($nums2 as $num) {
            if (!in_array($num, $nums1)) {
                $map2[] = $num;
            }
        }

        return [array_unique($map1), array_unique($map2)];
    }
}