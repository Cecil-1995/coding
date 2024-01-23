<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function minNumber($nums1, $nums2)
    {
        $min = 99;
        foreach ($nums1 as $n1) {
            foreach ($nums2 as $n2) {
                if ($n1 === $n2) {
                    $min = min($min, $n1);
                } elseif ($n1 < $n2) {
                    $min = min($min, $n1 * 10 + $n2);
                } else {
                    $min = min($min, $n2 * 10 + $n1);
                }
            }
        }

        return $min;
    }

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function minNumber2($nums1, $nums2)
    {
        $map  = [];
        $min1 = 9;
        $min2 = 9;
        $ans  = 99;
        foreach ($nums1 as $n1) {
            $min1     = min($min1, $n1);
            $map[$n1] = true;
        }
        foreach ($nums2 as $n2) {
            if (isset($map[$n2])) {
                $ans = min($ans, $n2);
            }
            $min2 = min($min2, $n2);
        }

        if ($ans === 99) {
            return $min1 < $min2 ? $min1 * 10 + $min2 : $min2 * 10 + $min1;
        } else {
            return $ans;
        }
    }
}