<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer[] $nums3
     * @param Integer[] $nums4
     * @return Integer
     */
    function fourSumCount($nums1, $nums2, $nums3, $nums4)
    {
        $result = 0;
        $map    = [];
        foreach ($nums1 as $num1) {
            foreach ($nums2 as $num2) {
                $map[$num1 + $num2] = isset($map[$num1 + $num2]) ? $map[$num1 + $num2] + 1 : 1;
            }
        }

        foreach ($nums3 as $num3) {
            foreach ($nums4 as $num4) {
                $result += $map[-$num3 - $num4] ?? 0;
            }
        }

        return $result;
    }
}