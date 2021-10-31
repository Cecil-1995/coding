<?php

class Solution
{

    /**
     * @param Integer $m
     * @param Integer $n
     * @param Integer[][] $indices
     * @return Integer
     */
    function oddCells($m, $n, $indices)
    {
        $count = 0;
        $map_m = array_fill(0, $m, 0);
        $map_n = array_fill(0, $n, 0);
        for ($i = 0; $i < count($indices); ++$i) {
            $map_m[$indices[$i][0]]++;
            $map_n[$indices[$i][1]]++;
        }

        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                if (($map_m[$i] + $map_n[$j]) % 2 !== 0) {
                    ++$count;
                }
            }
        }

        return $count;
    }
}

$a = new Solution();
var_dump($a->oddCells(2, 3, [[0, 1], [1, 1]]));