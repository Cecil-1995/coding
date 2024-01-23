<?php

class Solution
{

    /**
     * @param Integer[] $prices
     * @param Integer $money
     * @return Integer
     */
    function buyChoco($prices, $money)
    {
        sort($prices);

        return $money - $prices[0] - $prices[1] >= 0 ? $money - $prices[0] - $prices[1] : $money;
    }
}