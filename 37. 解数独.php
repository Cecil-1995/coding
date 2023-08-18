<?php

class Solution
{
    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board)
    {
        $this->backtrack($board, 0, 0);

        return null;
    }

    function backtrack(&$board, $i, $j)
    {
        if ($j === 9) {
            return $this->backtrack($board, $i + 1, 0);
        }
        if ($i === 9) {
            return true;
        }
        if ($board[$i][$j] !== '.') {
            return $this->backtrack($board, $i, $j + 1);
        }

        for ($k = 1; $k <= 9; ++$k) {
            $board[$i][$j] = strval($k);
            if ($this->checkRight($board, $i, $j) && $this->backtrack($board, $i, $j + 1)) {
                return true;
            }
            $board[$i][$j] = '.';
        }

        return false;
    }

    function checkRight($board, $i, $j)
    {
        // 当前行
        $map = $board[$i];
        if (!$this->checkFlag2($map)) {
            return false;
        }

        // 当前列
        $map = [];
        for ($ii = 0; $ii < 9; ++$ii) {
            $map[] = $board[$ii][$j];
        }
        if (!$this->checkFlag2($map)) {
            return false;
        }

        // 当前九格
        $map = [];
        $i   = floor($i / 3) * 3;
        $j   = floor($j / 3) * 3;
        for ($ii = 0; $ii < 3; ++$ii) {
            for ($jj = 0; $jj < 3; ++$jj) {
                $map[] = $board[intval($i + $ii)][intval($j + $jj)];
            }
        }
        if (!$this->checkFlag2($map)) {
            return false;
        }

        return true;
    }

    function checkFlag2($map)
    {
        $map = array_filter(
            $map, function ($item){
            return $item !== '.';
        }
        );
        if (count($map) !== count(array_unique($map))) {
            return false;
        }

        return true;
    }
}

$a = [
    ["5", "3", ".", ".", "7", ".", ".", ".", "."],
    ["6", ".", ".", "1", "9", "5", ".", ".", "."],
    [".", "9", "8", ".", ".", ".", ".", "6", "."],
    ["8", ".", ".", ".", "6", ".", ".", ".", "3"],
    ["4", ".", ".", "8", ".", "3", ".", ".", "1"],
    ["7", ".", ".", ".", "2", ".", ".", ".", "6"],
    [".", "6", ".", ".", ".", ".", "2", "8", "."],
    [".", ".", ".", "4", "1", "9", ".", ".", "5"],
    [".", ".", ".", ".", "8", ".", ".", "7", "9"]
];
(new Solution())->solveSudoku($a);
var_dump($a);