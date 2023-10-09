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
        $div = 5;
        while ($n >= $div) {
            $ans += floor($n / $div);
            $div *= 5;
        }

        return $ans;
    }
}