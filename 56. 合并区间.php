<?php

class Solution
{

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals)
    {
        $result = [];
        $n      = count($intervals);
        if ($n === 0) {
            return [];
        }

        usort(
            $intervals, function ($element1, $element2){
            if ($element1[1] == $element2[1]) {
                if ($element1[0] == $element2[0]) {
                    return 0;
                } elseif ($element1[0] > $element2[0]) {
                    return 1;
                } else {
                    return -1;
                }
            } elseif ($element1[1] > $element2[1]) {
                return 1;
            } else {
                return -1;
            }
        }
        );

        $left  = $intervals[$n - 1][0];
        $right = $intervals[$n - 1][1];
        for ($i = count($intervals) - 2; $i >= 0; --$i) {
            if ($left > $intervals[$i][1]) {
                array_unshift($result, [$left, $right]);
                $right = $intervals[$i][1];
            }
            $left = min($intervals[$i][0], $left);
        }
        array_unshift($result, [$left, $right]);

        return $result;
    }
}