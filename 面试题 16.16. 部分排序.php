<?php

class Solution
{

    /**
     * @param Integer[] $array
     * @return Integer[]
     */
    function subSort($array)
    {
        $n   = count($array);
        $ans = [];

        $min     = 0;
        $findMin = false;
        $max     = 0;
        $findMax = false;
        for ($i = 1; $i < $n; ++$i) {
            if (!$findMin && $array[$i] < $array[$i - 1]) {
                $findMin = true;
                $min     = $array[$i];
            }
            if ($findMin && $array[$i] < $min) {
                $min = $array[$i];
            }

            if (!$findMax && $array[$n - 1 - $i] > $array[$n - $i]) {
                $findMax = true;
                $max     = $array[$n - 1 - $i];
            }
            if ($findMax && $array[$n - 1 - $i] > $max) {
                $max = $array[$n - 1 - $i];
            }
        }
        if (!$findMin) {
            return [-1, -1];
        }

        for ($i = 0; $i < $n; ++$i) {
            if ($array[$i] > $min) {
                $ans[0] = $i;
                break;
            }
        }
        for ($i = $n - 1; $i >= 0; --$i) {
            if ($array[$i] < $max) {
                $ans[1] = $i;
                break;
            }
        }

        return $ans;
    }
}