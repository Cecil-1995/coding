<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        $nums1Count = count($nums1);
        $nums2Count = count($nums2);
        $count      = $nums1Count + $nums2Count;
        $middleR    = floor($count / 2);
        $middleL    = $count % 2 ? $middleR : $middleR - 1;

        $index = 0;
        $i     = $j = 0;
        while (true) {
            if (isset($nums1[$i]) && isset($nums2[$j])) {
                if ($nums1[$i] <= $nums2[$j]) {
                    $temp = $nums1[$i];
                    ++$i;
                    ++$index;
                } else {
                    $temp = $nums2[$j];
                    ++$j;
                    ++$index;
                }
            } elseif (isset($nums1[$i])) {
                $temp = $nums1[$i];
                ++$i;
                ++$index;
            } elseif (isset($nums2[$j])) {
                $temp = $nums2[$j];
                ++$j;
                ++$index;
            }

            if ($index-1 == $middleL) {
                $left = $temp;
            }
            if ($index-1 == $middleR) {
                return ($left + $temp) / 2;
            }

        }

    }
}

var_dump((new Solution())->findMedianSortedArrays([1, 3], [2]));