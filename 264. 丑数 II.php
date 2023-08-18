<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function nthUglyNumber($n)
    {
        $p1    = $p2 = $p3 = 1;
        $link1 = $link2 = $link3 = 1;
        $p     = 1;
        $dp    = [];
        while ($p <= $n) {
            $min      = min($link1, $link2, $link3);
            $dp[$p++] = $min;
            if ($min === $link1) {
                $link1 = $dp[$p1++] * 2;
            }
            if ($min === $link2) {
                $link2 = $dp[$p2++] * 3;
            }
            if ($min === $link3) {
                $link3 = $dp[$p3++] * 5;
            }
        }

        return $dp[$n];
    }
}