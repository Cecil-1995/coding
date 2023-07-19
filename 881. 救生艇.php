<?php

class Solution
{

    /**
     * @param Integer[] $people
     * @param Integer $limit
     * @return Integer
     */
    function numRescueBoats($people, $limit)
    {
        sort($people);
        $left  = 0;
        $right = count($people) - 1;
        $ans   = 0;
        while ($left <= $right) {
            $sum = $people[$left] + $people[$right];
            ++$ans;
            if ($sum <= $limit) {
                ++$left;
            }
            --$right;
        }

        return $ans;
    }
}