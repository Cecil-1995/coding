<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function numberOf2sInRange($n)
    {
        $ans     = 0;
        $current = 0;
        $dp      = 1;

        while ($n) {
            $i = $n % 10;
            if ($i >= 2) {
                $ans += $dp;
            }
            $ans     += $i * $current;
            $current = $dp + 10 * $current;

            $dp *= 10;
            $n  = floor($n / 10);
        }

        return $ans;
    }
}