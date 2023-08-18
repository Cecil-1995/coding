<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function findLength($nums1, $nums2)
    {
        $n1 = count($nums1);
        $n2 = count($nums2);

        $dp  = [];
        $max = 0;
        for ($i = $n1 - 1; $i >= 0; --$i) {
            for ($j = $n2 - 1; $j >= 0; --$j) {
                if ($nums1[$i] === $nums2[$j]) {
                    $dp[$i][$j] = 1 + $dp[$i + 1][$j + 1] ?? 0;
                } else {
                    $dp[$i][$j] = 0;
                }
                $max = max($max, $dp[$i][$j]);
            }
        }

        return $max;
    }
}