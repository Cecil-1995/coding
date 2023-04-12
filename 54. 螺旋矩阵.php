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
        $result = [];
        $order = ['top', 'right', 'bottom', 'left'];

        $index = 0;
        while ($top < $bottom && $left < $right) {
            for ()

        }

        return $result;
    }
}