<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findUnsortedSubarray($nums)
    {
        $nums2 = $nums;
        sort($nums2);
        $start = 0;
        $end   = count($nums) - 1;
        $flag  = false;

        for ($i = 0; $i < count($nums); ++$i) {
            if ($nums[$i] !== $nums2[$i]) {
                $flag  = true;
                $start = $i;
                break;
            }
        }
        if (!$flag) {
            return 0;
        }

        for ($i = count($nums) - 1; $i >= 0; --$i) {
            if ($nums[$i] !== $nums2[$i]) {
                $end = $i;
                break;
            }
        }

        return $end - $start + 1;


    }
}

var_dump((new Solution())->findUnsortedSubarray([1, 2, 3, 4]));
