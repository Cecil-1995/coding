<?php

class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        $left  = 0;
        $right = count($height) - 1;
        $res   = 0;

        while ($left < $right) {
            $res = max($res, min($height[$left], $height[$right]) * ($right - $left));

            if ($height[$left] < $height[$right]) {
                ++$left;
            } else {
                --$right;
            }
        }

        return $res;
    }
}