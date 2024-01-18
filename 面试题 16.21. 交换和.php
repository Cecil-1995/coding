<?php

class Solution
{

    /**
     * @param Integer[] $array1
     * @param Integer[] $array2
     * @return Integer[]
     */
    function findSwapValues($array1, $array2)
    {
        $sum1 = array_sum($array1);
        $sum  = $sum1 + array_sum($array2);
        if ($sum % 2) {
            return [];
        }
        $sum /= 2;

        $map = [];
        foreach ($array2 as $item) {
            $map[$item] = true;
        }

        for ($i = count($array1); $i >= 0; --$i) {
            if (isset($map[$sum - $sum1 + $array1[$i]])) {
                return [$array1[$i], $sum - $sum1 + $array1[$i]];
            }
        }

        return [];
    }
}