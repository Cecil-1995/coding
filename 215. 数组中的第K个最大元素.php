<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k)
    {
        rsort($nums);

        return $nums[$k - 1];
    }
}