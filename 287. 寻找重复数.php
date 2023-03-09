<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findDuplicate($nums)
    {
        $res = count($nums);
        for ($i = 0; $i < count($nums); ++$i) {
            $res ^= ($i+1) ^ $nums[$i];
        }

        return $res;
    }
}