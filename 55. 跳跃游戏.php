<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums)
    {
        $max = $nums[0];

        for ($i = 0; $i < count($nums); ++$i) {
            if ($i > $max) {
                return false;
            }

            $max = max($max, $i + $nums[$i]);
        }

        return true;
    }
}