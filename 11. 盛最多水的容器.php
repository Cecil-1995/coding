<?php

class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height)
    {
        $max = 0;

        for ($i = 0; $i < count($height); ++$i) {
            for ($j = $i + 1; $j < count($height); ++$j) {
                $max = max($max, ($j - $i) * min($height[$j], $height[$i]));
            }
        }

        return $max;
    }
}