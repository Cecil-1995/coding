<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @return Integer[]
     */
    function finalPrices($prices)
    {
        $n     = count($prices);
        $ans   = [];
        $stack = [];
        for ($i = $n - 1; $i >= 0; --$i) {
            while (!empty($stack) && $stack[0] > $prices[$i]) {
                array_shift($stack);
            }

            array_unshift($ans, empty($stack) ? $prices[$i] : $prices[$i] - $stack[0]);
            array_unshift($stack, $prices[$i]);
        }

        return $ans;
    }
}