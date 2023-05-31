<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function smallestEvenMultiple($n)
    {
        if ($n === 1) {
            return 2;
        } elseif ($n % 2) {
            return $n * 2;
        } else {
            return max(2, $n);
        }
    }
}