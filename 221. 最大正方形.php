<?php

class Solution
{

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalSquare($matrix)
    {
        $m = count($matrix);
        $n = count($matrix[0]);

        /**
         * $dp[$i][$j] 以（i，j）为右下角的最大正方形
         */
        $dp = [];
        if ($matrix[0][0] == 1) {
            $dp[0][0] = 1;
            $max      = 1;
        } else {
            $dp[0][0] = 0;
            $max      = 0;
        }
        for ($i = 1; $i < $m; ++$i) {
            if ($matrix[$i][0] == 1) {
                $dp[$i][0] = 1;
                $max       = 1;
            } else {
                $dp[$i][0] = 0;
            }
        }
        for ($j = 1; $j < $n; ++$j) {
            if ($matrix[0][$j] == 1) {
                $dp[0][$j] = 1;
                $max       = 1;
            } else {
                $dp[0][$j] = 0;
            }
        }

        for ($i = 1; $i < $m; ++$i) {
            for ($j = 1; $j < $n; ++$j) {
                if ($matrix[$i][$j] == 1) {
                    $dp[$i][$j] = min($dp[$i - 1][$j], $dp[$i][$j - 1], $dp[$i - 1][$j - 1]) + 1;
                } else {
                    $dp[$i][$j] = 0;
                }

                $max = max($max, $dp[$i][$j]);
            }
        }

        return $max * $max;
    }

}

var_dump(
    (new Solution())->maximalSquare(
        [["0", "0", "0", "1"], ["1", "1", "0", "1"], ["1", "1", "1", "1"], ["0", "1", "1", "1"], ["0", "1", "1", "1"]]
    )
);