<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix)
    {
        $n = count($matrix);

        for ($i = 0; $i < $n; ++$i) {
            for ($j = $i; $j < $n; ++$j) {
                $temp           = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$j][$i];
                $matrix[$j][$i] = $temp;
            }
        }

        for ($i = 0; $i < $n; ++$i) {
            for ($j = 0; $j < ceil($n / 2); ++$j) {
                $temp                    = $matrix[$i][$j];
                $matrix[$i][$j]          = $matrix[$i][$n - 1 - $j];
                $matrix[$i][$n - 1 - $j] = $temp;
            }
        }

        return null;
    }
}