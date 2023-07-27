<?php

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxAreaOfIsland($grid)
    {
        $m   = count($grid);
        $n   = count($grid[0]);
        $max = 0;

        $fun = function (&$grid, $i, $j, $count, $fun) use ($m, $n){
            $grid[$i][$j] = 0;
            // 判断上下左右是否为1
            if ($i > 0 && $grid[$i - 1][$j] === 1) {
                $count += $fun($grid, $i - 1, $j, 1, $fun);
            }
            if ($i < $m-1 && $grid[$i + 1][$j] === 1) {
                $count += $fun($grid, $i + 1, $j, 1, $fun);
            }
            if ($j > 0 && $grid[$i][$j-1] === 1) {
                $count += $fun($grid, $i, $j - 1, 1, $fun);
            }
            if ($j < $n -1 && $grid[$i][$j+1] === 1) {
                $count += $fun($grid, $i, $j + 1, 1, $fun);
            }

            return $count;
        };

        foreach ($grid as $i => $ii) {
            foreach ($ii as $j => $jj) {
                if ($jj === 1) {
                    $max = max($max, $fun($grid, $i, $j, 1, $fun));
                }
            }
        }

        return $max;
    }
}