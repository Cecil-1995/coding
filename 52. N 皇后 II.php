<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function totalNQueens($n)
    {
        $chess = [];
        for ($i = 0; $i < $n; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                $chess[$i][$j] = '.';
            }
        }
        $ans = 0;

        $this->backtrack($chess, 0, $ans, $n);

        return $ans;
    }

    function backtrack(&$chess, $i, &$ans, $n)
    {
        if ($i === $n) {
            ++$ans;

            return;
        }

        for ($j = 0; $j < $n; ++$j) {
            // 选择
            $chess[$i][$j] = 'Q';
            // 递归
            if ($this->isSafe($chess, $i, $j, $n)) {
                $this->backtrack($chess, $i + 1, $ans, $n);
            }
            // 撤销
            $chess[$i][$j] = '.';
        }

    }

    function isSafe(&$chess, $i, $j, $n)
    {
        // 判断当前元素的所在列的上面是否合法，坐斜上，右斜上是否合法
        for ($ii = 0; $ii < $i; ++$ii) {
            if ($chess[$ii][$j] === 'Q') {
                return false;
            }
        }

        for ($ii = $i - 1, $jj = $j - 1; $ii >= 0 && $jj >= 0; --$ii, --$jj) {
            if ($chess[$ii][$jj] === 'Q') {
                return false;
            }
        }

        for ($ii = $i - 1, $jj = $j + 1; $ii >= 0 && $jj < $n; --$ii, ++$jj) {
            if ($chess[$ii][$jj] === 'Q') {
                return false;
            }
        }

        return true;
    }
}