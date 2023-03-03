<?php

class Solution
{

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid)
    {
        $m = count($grid);
        if ($m === 0) {
            return 0;
        }
        $n = count($grid[0]);
        if ($n === 0) {
            return 0;
        }

        $dp[0][0] = $grid[0][0];

        for ($i = 1; $i < $n; ++$i) {
            $dp[0][$i] = $dp[0][$i - 1] + $grid[0][$i];
        }
        for ($j = 1; $j < $m; ++$j) {
            $dp[$j][0] = $dp[$j - 1][0] + $grid[$j][0];
        }

        for ($i = 1; $i < $m; ++$i) {
            for ($j = 1; $j < $n; ++$j) {
                $dp[$i][$j] = min($dp[$i - 1][$j], $dp[$i][$j - 1]) + $grid[$i][$j];
            }
        }

        return $dp[$m - 1][$n - 1];
    }
}

var_dump((new Solution())->minPathSum([[1,2,3],[4,5,6]]));