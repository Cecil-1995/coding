<?php

class Solution
{

    /**
     * @param Integer[] $temperatures
     * @return Integer[]
     */
    function dailyTemperatures($temperatures)
    {
        $stack  = [];
        $result = [];

        for ($i = count($temperatures) - 1; $i >= 0; --$i) {
            while (!empty($stack) && $temperatures[end($stack)] <= $temperatures[$i]) {
                array_pop($stack);
            }

            array_unshift($result, empty($stack) ? 0 : end($stack) - $i);
            array_push($stack, $i);
        }

        return $result;
    }
}