<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors($nums)
    {
        $left  = -1;
        $right = count($nums);

        for ($i = 0; $i < count($nums); ++$i) {
            if ($nums[$i] === 0) {
                ++$left;
                $nums[$i]    = $nums[$left];
                $nums[$left] = 0;
                if ($i !== $left) {
                    --$i;
                }
            } elseif ($nums[$i] === 2 && $i < $right) {
                --$right;
                $nums[$i]     = $nums[$right];
                $nums[$right] = 2;
                if ($i !== $right) {
                    --$i;
                }
            }
        }

        return $nums;
    }
}

var_dump((new Solution())->sortColors([1, 2, 0]));