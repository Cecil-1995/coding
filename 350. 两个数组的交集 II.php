<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2)
    {
        $result = [];
        sort($nums1);
        sort($nums2);

        $i = $j = 0;
        while ($i < count($nums1) && $j < count($nums2)) {
            if ($nums1[$i] === $nums2[$j]) {
                $result[] = $nums1[$i];
                ++$i;
                ++$j;
            } elseif ($nums1[$i] > $nums2[$j]) {
                ++$j;
            } else {
                ++$i;
            }
        }

        return $result;
    }
}