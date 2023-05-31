<?php

class Solution
{

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n)
    {
        $count = count($flowerbed);
        if ($count === 0) {
            return false;
        }

        for ($i = 0; $i < $count; ++$i) {
            if (isset($flowerbed[$i - 1]) && $flowerbed[$i - 1] === 1) {
                continue;
            } elseif (isset($flowerbed[$i + 1]) && $flowerbed[$i + 1] === 1) {
                continue;
            } elseif ($flowerbed[$i] === 1) {
                continue;
            } else {
                $flowerbed[$i] = 1;
                --$n;
            }
        }

        return !($n > 0);
    }
}