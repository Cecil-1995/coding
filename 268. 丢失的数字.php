<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums)
    {
        $n = count($nums);
        $res = $n;

        for ($i = 0; $i < $n; ++$i) {
            $res ^= $i ^ $nums[$i];
        }
        return $res;
    }
}