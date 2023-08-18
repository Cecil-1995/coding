<?php

class Solution
{

    public $map = [];

    /**
     * @param Integer[][] $dungeon
     * @return Integer
     */
    function calculateMinimumHP($dungeon)
    {
        return $this->dp($dungeon, 0, 0);
    }

    // 从i,j到终点需要的生命
    function dp(&$dungeon, $i, $j)
    {
        if (isset($this->map[$i][$j])) {
            return $this->map[$i][$j];
        }

        $m = count($dungeon);
        $n = count($dungeon[0]);

        if ($i === $m - 1 && $j === $n - 1) {
            return $dungeon[$i][$j] >= 0 ? 1 : 1 - $dungeon[$i][$j];
        }
        if ($i === $m || $j === $n) {
            return PHP_INT_MAX;
        }

        $res = min($this->dp($dungeon, $i + 1, $j), $this->dp($dungeon, $i, $j + 1)) - $dungeon[$i][$j];
        $res = $res > 0 ? $res : 1;

        $this->map[$i][$j] = $res;

        return $res;
    }

    function calculateMinimumHP2($dungeon)
    {
        $m = count($dungeon);
        $n = count($dungeon[0]);

        $dp                 = [];
        $dp[$m - 1][$n - 1] = $dungeon[$m - 1][$n - 1] >= 0 ? 1 : 1 - $dungeon[$m - 1][$n - 1];
        for ($i = $m - 2; $i >= 0; --$i) {
            $dp[$i][$n - 1] = max($dp[$i + 1][$n - 1] - $dungeon[$i][$n - 1], 1);
        }
        for ($j = $n - 2; $j >= 0; --$j) {
            $dp[$m - 1][$j] = max($dp[$m - 1][$j + 1] - $dungeon[$m - 1][$j], 1);
        }

        for ($i = $m - 2; $i >= 0; --$i) {
            for ($j = $n - 2; $j >= 0; --$j) {
                $dp[$i][$j] = max(min($dp[$i + 1][$j], $dp[$i][$j + 1]) - $dungeon[$i][$j], 1);
            }
        }

        return $dp[0][0];
    }
}

var_dump((new Solution())->calculateMinimumHP([[1, -3, 3], [0, -2, 0], [-3, -3, -3]]));