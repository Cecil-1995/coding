<?php

class Solution
{

    /**
     * @param Integer[] $a
     * @param Integer[] $b
     * @return Integer
     */
    function smallestDifference($a, $b)
    {
        sort($a);
        sort($b);
        $n   = count($a);
        $i   = 0;
        $j   = 0;
        $min = PHP_INT_MAX;
        while ($i < $n && $j < $n) {
            $min = min($min, abs($a[$i] - $b[$j]));
            if ($a[$i] > $b[$j]) {
                ++$j;
            } elseif ($a[$i] < $b[$j]) {
                ++$i;
            } else {
                break;
            }
        }

        return $min;
    }
}