<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2)
    {
        $map = [];
        $ans = [];
        foreach ($nums1 as $num) {
            $map[$num] = true;
        }
        foreach ($nums2 as $num) {
            if (isset($map[$num])) {
                $ans[$num] = true;
            }
        }

        return array_keys($ans);
    }
}