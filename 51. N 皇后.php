<?php

/**
 * https://leetcode-cn.com/problems/n-queens/
 */
class Solution
{
    /**
     * @param Integer $n
     * @return String[][]
     */
    public function solveNQueens($n)
    {
        $result = [];

        $chess[] = [];
        for ($i = 0; $i < $n; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                $chess[$i][$j] = '.';
            }
        }

        $this->putQueenRow($chess, 0, $n, $result);

        foreach ($result as $k => $v) {
            foreach ($v as $kk => $vv) {
                $result[$k][$kk] = implode('', $vv);
            }
        }

        return $result;
    }

    function putQueenRow($chess, $row, $n, &$result)
    {
        if ($row === $n) {
            // 所有行都处理完了
            $result[] = $chess;

            return;
        }

        for ($i = 0; $i < $n; ++$i) {
            $chess[$row][$i] = 'Q';
            if ($this->isSafety($chess, $row, $i)) {
                $this->putQueenRow($chess, $row + 1, $n, $result);
            }
            $chess[$row][$i] = '.';
        }
    }

    function isSafety($chess, $row, $col)
    {
        $step = 1;
        while ($row - $step >= 0) {
            if (isset($chess[$row - $step][$col]) && $chess[$row - $step][$col] === 'Q') {
                return false;
            } elseif (isset($chess[$row - $step][$col - $step]) && $chess[$row - $step][$col - $step] === 'Q') {
                return false;
            } elseif (isset($chess[$row - $step][$col + $step]) && $chess[$row - $step][$col + $step] === 'Q') {
                return false;
            }
            ++$step;
        }

        return true;
    }
}

$a = new Solution();
$a->solveNQueens(8);
