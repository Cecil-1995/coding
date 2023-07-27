<?php

class Solution
{

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board)
    {
        $flag = true;
        for ($i = 0; $i < 9; ++$i) {
            for ($j = 0; $j < 9; ++$j) {
                if ($board[$i][$j] === '.') {
                    $flag = false;
                }
            }
        }
        if ($flag) {
            return null;
        }

        for ($i = 0; $i < 9; ++$i) {
            for ($j = 0; $j < 9; ++$j) {
                if ($board[$i][$j] === '.') {
                    for ($num = 1; $num < 10; ++$num) {
                        $board[$i][$j] = strval($num);
                        if ($this->checkRight($board, $i, $j)) {
                            $this->solveSudoku($board);
                        }
                    }
                    if ($num === 10) {
                        // 当前不满足，撤回
                        $board[$i][$j] = '.';
                    }
                }
            }
        }


        $this->backtrack($board, 0);

        return null;
    }

    function backtrack(&$board, $row)
    {
        if ($row === 9) {
            return;
        }

        for ($i = 0; $i < 9; ++$i) {
            for ($j = 0; $j < 9; ++$j) {
                if ($board[$i][$j] === '.') {
                    for ($num = 1; $num < 10; ++$num) {
                        $board[$i][$j] = strval($num);
                        if ($this->checkRight($board, $i, $j)) {
                            if ($j + 1 === 9) {
                                $this->backtrack($board, $i + 1);
                            } else {
                                $this->backtrack($board, $i);
                            }
                        }
                    }
                    if ($num === 10) {
                        // 当前不满足，撤回
                        $board[$i][$j] = '.';
                    }
                }
            }
        }


        if ($board[$i][$j] === '.') {

        }

        if (++$j === 9) {
            ++$i;
            $j = 0;
        }
        $this->backtrack($board, $i, $j);
    }

    function checkRight(&$board, $i, $j)
    {
        // 当前行
        $map = [];
        for ($jj = 0; $jj < 9; ++$jj) {
            if ($board[$i][$jj] !== '.' && isset($map[$board[$i][$jj]])) {
                return false;
            }
            $map[$board[$i][$jj]] = true;
        }

        // 当前列
        $map = [];
        for ($ii = 0; $ii < 9; ++$ii) {
            if ($board[$ii][$j] !== '.' && isset($map[$board[$ii][$j]])) {
                return false;
            }
            $map[$board[$ii][$j]] = true;
        }

        // 当前九格
        $map = [];
        for ($ii = 0; $ii < 3; ++$ii) {
            for ($jj = 0; $jj < 3; ++$jj) {
                if ($board[$ii + floor($i / 3) * 3][$jj + floor($j / 3) * 3] !== '.' && isset(
                        $map[$board[$ii + floor(
                            $i / 3
                        ) * 3][$jj + floor($j / 3) * 3]]
                    )) {
                    return false;
                }
                $map[$board[$ii + floor($i / 3) * 3][$jj + floor($j / 3) * 3]] = true;
            }
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
var_dump((new Solution())->solveSudoku($a));
var_dump($a);