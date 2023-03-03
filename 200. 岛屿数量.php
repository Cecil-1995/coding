<?php

class Solution
{
    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid)
    {
        $count = 0;
        for ($i = 0; $i < count($grid); ++$i) {
            for ($j = 0; $j < count($grid[0]); ++$j) {
                if ($grid[$i][$j] === '1') {
                    ++$count;
                    $this->change($grid, $i, $j);
                }
            }
        }


        return $count;
    }

    function change(&$grid, $i, $j)
    {
        $grid[$i][$j] = '0';
        if (isset($grid[$i - 1][$j]) && $grid[$i - 1][$j] === '1') {
            $this->change($grid, $i - 1, $j);
        }
        if (isset($grid[$i + 1][$j]) && $grid[$i + 1][$j] === '1') {
            $this->change($grid, $i + 1, $j);
        }
        if (isset($grid[$i][$j - 1]) && $grid[$i][$j - 1] === '1') {
            $this->change($grid, $i, $j - 1);
        }
        if (isset($grid[$i][$j + 1]) && $grid[$i][$j + 1] === '1') {
            $this->change($grid, $i, $j + 1);
        }
    }
}