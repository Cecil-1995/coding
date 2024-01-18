<?php

class Solution
{

    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n)
    {
        $ans    = [];
        $result = [];
        for ($i = 0; $i < $n; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                $result[$i][$j] = '.';
            }
        }
        $this->backstack($n, 0, $result, $ans);

        return $ans;
    }

    function backstack($n, $row, $result, &$ans)
    {
        if ($n === $row) {
            foreach ($result as $i => $item) {
                $result[$i] = implode('', $item);
            }
            $ans[] = $result;

            return;
        }

        for ($i = 0; $i < $n; ++$i) {
            if (!$this->isValid($result, $row, $i)) {
                continue;
            }
            $result[$row][$i] = 'Q';
            $this->backstack($n, $row + 1, $result, $ans);
            $result[$row][$i] = '.';
        }
    }

    function isValid($result, $i, $j)
    {
        for ($ii = 0; $ii < $i; ++$ii) {
            if ($result[$ii][$j] === 'Q') {
                return false;
            }
        }
        $ii = $i - 1;
        $jj = $j - 1;
        while ($ii >= 0 && $jj >= 0) {
            if ($result[$ii--][$jj--] === 'Q') {
                return false;
            }
        }
        $ii = $i - 1;
        $jj = $j + 1;
        while ($ii >= 0 && $jj < count($result)) {
            if ($result[$ii--][$jj++] === 'Q') {
                return false;
            }
        }

        return true;
    }
}