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

            if ($index - 1 == $middleL) {
                $left = $temp;
            }
            if ($index - 1 == $middleR) {
                return ($left + $temp) / 2;
            }

        }

    }

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays2($nums1, $nums2)
    {
        $nums1Count = count($nums1);
        $nums2Count = count($nums2);
        if (($nums1Count + $nums2Count) % 2) {
            $left = $right = intval(floor(($nums1Count + $nums2Count) / 2));
        } else {
            $right = intval(($nums1Count + $nums2Count) / 2);
            $left  = $right - 1;
        }

        $i          = 0;
        $nums1Index = 0;
        $nums2Index = 0;
        while (true) {
            if ($nums1Index < $nums1Count && $nums2Index < $nums2Count) {
                if ($nums1[$nums1Index] <= $nums2[$nums2Index]) {
                    ++$nums1Index;
                    $item = $nums1[$nums1Index - 1];
                } else {
                    ++$nums2Index;
                    $item = $nums2[$nums2Index - 1];
                }
            } elseif ($nums1Index < $nums1Count) {
                ++$nums1Index;
                $item = $nums1[$nums1Index - 1];
            } else {
                ++$nums2Index;
                $item = $nums2[$nums2Index - 1];
            }
            if ($left === $i) {
                $a = $item;
            }
            if ($right === $i) {
                return ($a + $item) / 2;
            }
            ++$i;
        }
    }
}

var_dump((new Solution())->findMedianSortedArrays2([1, 3], [2]));