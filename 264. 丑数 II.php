<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function nthUglyNumber($n)
    {
        $link1 = 2;
        $link2 = 3;
        $link3 = 5;

        $index = 1;
        $dp[0] = 1;
        while ($index < $n) {
            $min = min($link1, $link2, $link3);

            if ($min === $link1) {
                $dp[$index++] = $link1;
                $link1        *= 2;
            }
            if ($min === $link2) {
                $dp[$index++] = $link2;
                $link2        *= 3;
            }
            if ($min === $link3) {
                $dp[$index++] = $link3;
                $link3        *= 5;
            }
        }
        var_dump($dp);

        return $dp[$n - 1];
    }
}