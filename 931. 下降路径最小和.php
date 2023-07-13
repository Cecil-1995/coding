<?php

class Solution
{
    public $min = PHP_INT_MAX;

    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function minFallingPathSum($matrix)
    {
        $n = count($matrix);
        for ($j = 0; $j < $n; ++$j) {
            $this->backtrack($matrix, 0, $j, $n, 0);
        }

        return $this->min;
    }

    function backtrack(&$matrix, $i, $j, $n, $sum)
    {
        $sum += $matrix[$i][$j];

        if ($i === $n - 1) {
            $this->min = min($this->min, $sum);

            return;
        }

        $this->backtrack($matrix, $i + 1, $j, $n, $sum);
        if ($j > 0) {
            $this->backtrack($matrix, $i + 1, $j - 1, $n, $sum);
        }
        if ($j < $n - 1) {
            $this->backtrack($matrix, $i + 1, $j + 1, $n, $sum);
        }
    }

    function minFallingPathSum2($matrix)
    {
        $max = PHP_INT_MAX;
        $dp  = [];
        $n   = count($matrix);
        for ($j = 0; $j < $n; ++$j) {
            $dp[0][$j] = $matrix[0][$j];
        }

        for ($i = 1; $i < $n; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                $dp[$i][$j] = $matrix[$i][$j] + min(
                        $dp[$i - 1][$j - 1] ?? $max, $dp[$i - 1][$j], $dp[$i - 1][$j + 1] ?? $max
                    );
            }
        }

        $ans = $dp[$n - 1][0];
        for ($j = 1; $j < $n; ++$j) {
            $ans = min($ans, $dp[$n - 1][$j]);
        }

        return $ans;
    }
}