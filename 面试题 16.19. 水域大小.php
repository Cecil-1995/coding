<?php

class Solution
{

    /**
     * @param Integer[][] $land
     * @return Integer[]
     */
    function pondSizes($land)
    {
        $ans = [];
        $row = count($land);
        $col = count($land[0]);

        for ($i = 0; $i < $row; ++$i) {
            for ($j = 0; $j < $col; ++$j) {
                if ($land[$i][$j] === 0) {
                    $ans[] = $this->helper($land, $i, $j, $row, $col, 1);
                }
            }
        }

        sort($ans);

        return $ans;
    }

    function helper(&$land, $i, $j, $row, $col, $result)
    {
        $land[$i][$j] = 1;

        $dp = [
            [-1, 0],
            [1, 0],
            [0, -1],
            [0, 1],
            [-1, -1],
            [-1, 1],
            [1, -1],
            [1, 1],
        ];

        foreach ($dp as $item) {
            $new_i = $i + $item[0];
            $new_j = $j + $item[1];
            if ($new_i >= 0 && $new_i < $row && $new_j >= 0 && $new_j < $col && $land[$new_i][$new_j] === 0) {
                $result = $this->helper($land, $new_i, $new_j, $row, $col, $result + 1);
            }
        }

        return $result;
    }
}