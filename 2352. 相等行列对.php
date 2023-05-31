<?php

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function equalPairs($grid)
    {
        $n     = count($grid);
        $grid2 = [];
        $map   = [];

        for ($i = 0; $i < $n; ++$i) {
            $temp    = [];
            $tempMap = '';
            for ($j = 0; $j < $n; ++$j) {
                $temp[]  = $grid[$j][$i];
                $tempMap .= $grid[$i][$j] . '_';
            }
            $grid2[]       = $temp;
            $map[$tempMap] = isset($map[$tempMap]) ? ++$map[$tempMap] : 1;
        }

        $count = 0;
        for ($i = 0; $i < $n; ++$i) {
            $tempMap = '';
            for ($j = 0; $j < $n; ++$j) {
                $tempMap .= $grid2[$i][$j] . '_';
            }
            if (isset($map[$tempMap])) {
                $count += $map[$tempMap];
            }
        }

        return $count;
    }
}