<?php

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function islandPerimeter($grid)
    {
        $m   = count($grid);
        $n   = count($grid[0]);
        $max = 0;

        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                if ($grid[$i][$j] === 1) {
                    $this->dfs($grid, $i, $j, $max, $m, $n);
                    break;
                }
            }
        }

        return $max;
    }

    function dfs(&$grid, $i, $j, &$count, $m, $n)
    {
        $grid[$i][$j] = 2;

        if ($i === 0 || $grid[$i - 1][$j] === 0) {
            ++$count;
        } elseif ($grid[$i - 1][$j] === 1) {
            $this->dfs($grid, $i - 1, $j, $count, $m, $n);
        }

        if ($i === $m - 1 || $grid[$i + 1][$j] === 0) {
            ++$count;
        } elseif ($grid[$i + 1][$j] === 1) {
            $this->dfs($grid, $i + 1, $j, $count, $m, $n);
        }

        if ($j === 0 || $grid[$i][$j - 1] === 0) {
            ++$count;
        } elseif ($grid[$i][$j - 1] === 1) {
            $this->dfs($grid, $i, $j - 1, $count, $m, $n);
        }

        if ($j === $n - 1 || $grid[$i][$j + 1] === 0) {
            ++$count;
        } elseif ($grid[$i][$j + 1] === 1) {
            $this->dfs($grid, $i, $j + 1, $count, $m, $n);
        }
    }
}