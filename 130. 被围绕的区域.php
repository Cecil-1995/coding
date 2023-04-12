<?php

class Solution
{

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board)
    {
        $m = count($board);
        if ($m === 0) {
            return;
        }
        $n = count($board[0]);
        if ($n === 0) {
            return;
        }

        for ($j = 0; $j < $n; ++$j) {
            if ($board[0][$j] === 'O') {
                // 将当前的O和相邻的O特殊标记
                $this->change($board, $m, $n, 0, $j);
            }
            if ($board[$m - 1][$j] === 'O') {
                // 将当前的O和相邻的O特殊标记
                $this->change($board, $m, $n, $m - 1, $j);
            }
        }

        for ($i = 0; $i < $m; ++$i) {
            if ($board[$i][0] === 'O') {
                // 将当前的O和相邻的O特殊标记
                $this->change($board, $m, $n, $i, 0);
            }
            if ($board[$i][$n - 1] === 'O') {
                // 将当前的O和相邻的O特殊标记
                $this->change($board, $m, $n, $i, $n - 1);
            }
        }

        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                if ($board[$i][$j] === 'O') {
                    $board[$i][$j] = 'X';
                } elseif ($board[$i][$j] === 'C') {
                    $board[$i][$j] = 'O';
                }
            }
        }

        return;
    }

    function change(&$board, $m, $n, $i, $j)
    {
        $board[$i][$j] = 'C';

        // 上
        if ($i !== 0 && $board[$i - 1][$j] === 'O') {
            $this->change($board, $m, $n, $i - 1, $j);
        }
        //下
        if ($i !== $m - 1 && $board[$i + 1][$j] === 'O') {
            $this->change($board, $m, $n, $i + 1, $j);
        }
        //左
        if ($j !== 0 && $board[$i][$j - 1] === 'O') {
            $this->change($board, $m, $n, $i, $j - 1);
        }
        //右
        if ($j !== $n - 1 && $board[$i][$j + 1] === 'O') {
            $this->change($board, $m, $n, $i, $j + 1);
        }
    }
}