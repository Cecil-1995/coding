<?php

class Solution
{

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalRectangle($matrix)
    {
        $max = 0;
        $m   = count($matrix);
        $n   = count($matrix[0]);

        $left = [];
        for ($i = 0; $i < $m; ++$i) {
            $left[$i][0] = $matrix[$i][0] === '1' ? 1 : 0;
        }
        for ($i = 0; $i < $m; ++$i) {
            for ($j = 1; $j < $n; ++$j) {
                $left[$i][$j] = $matrix[$i][$j] === '1' ? 1 + $left[$i][$j - 1] : 0;
            }
        }

        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                $width = $left[$i][$j];
                for ($k = $i; $k >= 0; --$k) {
                    $width = min($width, $left[$k][$j]);
                    $max   = max($width * ($i - $k + 1), $max);
                }
            }
        }

        return $max;
    }
}