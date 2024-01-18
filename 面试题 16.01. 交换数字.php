<?php

class Solution
{

    /**
     * @param Integer[] $numbers
     * @return Integer[]
     */
    function swapNumbers($numbers)
    {
        $numbers[0] ^= $numbers[1];
        $numbers[1] ^= $numbers[0];
        $numbers[0] ^= $numbers[1];

        return $numbers;
    }
}