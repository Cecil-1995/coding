<?php

class Solution
{

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer[][]
     */
    function pathWithObstacles($obstacleGrid)
    {
        $row = count($obstacleGrid);
        if ($row === 0) {
            return [];
        }
        $col = count($obstacleGrid[0]);
        if ($col === 0) {
            return [];
        }
        $ans = [[0, 0]];

        if ($this->backtrack($obstacleGrid, $row, $col, $ans)) {
            return $ans;
        }

        return [];
    }

    function backtrack($obstacleGrid, $row, $col, &$ans)
    {
        $item = $ans[count($ans) - 1];
        if ($obstacleGrid[$item[0]][$item[1]]) {
            return false;
        }
        if ($item[0] === $row - 1 && $item[1] === $col - 1) {
            return true;
        }

        // 向下走或者向右走
        if ($item[0] + 1 < $row) {
            $ans[] = [$item[0] + 1, $item[1]];
            if ($this->backtrack($obstacleGrid, $row, $col, $ans)) {
                return true;
            }
            array_pop($ans);
        }
        if ($item[1] + 1 < $col) {
            $ans[] = [$item[0], $item[1] + 1];
            if ($this->backtrack($obstacleGrid, $row, $col, $ans)) {
                return true;
            }
            array_pop($ans);
        }

        return false;
    }

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer[][]
     */
    function pathWithObstacles2($obstacleGrid)
    {
        $row = count($obstacleGrid);
        if ($row === 0) {
            return [];
        }
        $col = count($obstacleGrid[0]);
        if ($col === 0) {
            return [];
        }
        if ($obstacleGrid[0][0] === 1 || $obstacleGrid[$row - 1][$col - 1] === 1) {
            return [];
        }

        $dp[0][0] = [[0, 0]];
        for ($i = 1; $i < $row; ++$i) {
            if ($obstacleGrid[$i][0] === 0) {
                $dp[$i][0] = empty($dp[$i - 1][0]) ? [] : array_merge($dp[$i - 1][0], [[$i, 0]]);
            } else {
                $dp[$i][0] = [];
            }
        }
        for ($j = 1; $j < $col; ++$j) {
            var_dump($obstacleGrid[0][$j]);
            if ($obstacleGrid[0][$j] === 0) {
                $dp[0][$j] = empty($dp[0][$j - 1]) ? [] : array_merge($dp[0][$j - 1], [[0, $j]]);
            } else {
                $dp[0][$j] = [];
            }
        }
        for ($i = 1; $i < $row; ++$i) {
            for ($j = 1; $j < $col; ++$j) {
                if ($obstacleGrid[$i][$j] === 1) {
                    $dp[$i][$j] = [];
                } else {
                    if (!empty($dp[$i - 1][$j])) {
                        $dp[$i][$j] = array_merge($dp[$i - 1][$j], [[$i, $j]]);
                    } elseif (!empty($dp[$i][$j - 1])) {
                        $dp[$i][$j] = array_merge($dp[$i][$j - 1], [[$i, $j]]);
                    } else {
                        $dp[$i][$j] = [];
                    }
                }
            }
        }

        return $dp[$row - 1][$col - 1];
    }
}

var_dump((new Solution())->pathWithObstacles2([[0, 0, 0], [0, 1, 0], [0, 0, 0]]));