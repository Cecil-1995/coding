<?php

class Solution
{

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target)
    {
        $left  = 0;
        $right = count($numbers) - 1;

        while ($left < $right) {
            $sum = $numbers[$left] + $numbers[$right];
            if ($sum > $target) {
                --$right;
            } elseif ($sum < $target) {
                ++$left;
            } else {
                return [$left + 1, $right + 1];
            }
        }

        return [];
    }
}