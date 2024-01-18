<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function trailingZeroes($n)
    {
        $ans = 0;
        $i   = 1;

        while (pow(5, $i) <= $n) {
            $ans += floor($n / pow(5, $i));
            ++$i;
        }

        return $ans;
    }

    function trailingZeroes2($n)
    {
        $ans = 0;

        while ($n >= 5) {
            $n = floor($n/5);
            $ans += $n;
        }

        return $ans;
    }
}