<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix)
    {
        $m = count($matrix);
        $n = count($matrix[0]);

        $top    = 0;
        $left   = 0;
        $bottom = $m - 1;
        $right  = $n - 1;
        $ans    = [];

        while ($top <= $bottom && $left <= $right) {
            for ($i = $left; $i <= $right; ++$i) {
                $ans[] = $matrix[$top][$i];
            }
            if ($top === $bottom) {
                break;
            }
            for ($i = $top + 1; $i <= $bottom; ++$i) {
                $ans[] = $matrix[$i][$right];
            }
            if ($left === $right) {
                break;
            }
            for ($i = $right - 1; $i >= $left; --$i) {
                $ans[] = $matrix[$bottom][$i];
            }
            for ($i = $bottom - 1; $i > $top; --$i) {
                $ans[] = $matrix[$i][$left];
            }
            ++$top;
            --$bottom;
            ++$left;
            --$right;
        }

        return $ans;
    }
}