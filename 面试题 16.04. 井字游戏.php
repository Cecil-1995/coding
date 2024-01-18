<?php

class Solution
{

    /**
     * @param String[] $board
     * @return String
     */
    function tictactoe($board)
    {
        $n       = count($board);
        $pending = false;

        // 检查每一行是否有赢家
        for ($i = 0; $i < $n; ++$i) {
            $flag = $this->helper(str_split($board[$i]), $pending);
            if ($flag === 'X' || $flag === 'O') {
                return $flag;
            }
        }
        // 检查每一列是否有赢家
        for ($j = 0; $j < $n; ++$j) {
            $col = [];
            for ($i = 0; $i < $n; ++$i) {
                $col[] = $board[$i][$j];
            }
            $flag = $this->helper($col, $pending);
            if ($flag === 'X' || $flag === 'O') {
                return $flag;
            }
        }
        // 检查对角线是否有赢家
        $row = [];
        for ($i = 0, $j = 0; $i < $n; ++$i, ++$j) {
            $row[] = $board[$i][$j];
        }
        $flag = $this->helper($row, $pending);
        if ($flag === 'X' || $flag === 'O') {
            return $flag;
        }
        $row = [];
        for ($i = 0, $j = $n - 1; $i < $n; ++$i, --$j) {
            $row[] = $board[$i][$j];
        }
        $flag = $this->helper($row, $pending);
        if ($flag === 'X' || $flag === 'O') {
            return $flag;
        }

        if ($pending) {
            return 'Pending';
        } else {
            return 'Draw';
        }
    }

    function helper($rows, &$pending)
    {
        if (in_array(' ', $rows)) {
            $pending = true;

            return 'Pending';
        }
        if (in_array('X', $rows) && in_array('O', $rows)) {
            return 'Draw';
        } else {
            return $rows[0];
        }
    }
}

var_dump((new Solution())->tictactoe(["O X", " XO", "X O"]));