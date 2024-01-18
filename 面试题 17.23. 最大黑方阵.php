<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function findSquare($matrix)
    {
        $n = count($matrix);
        if ($n === 0) {
            return [];
        }

        $ans = [0, 0, 0];
        /**
         * $dp[$i][$j][0] 以i，j为坐标右边的黑点数
         * $dp[$i][$j][1] 以i，j为坐标下边的黑点数
         */
        $dp = [];
        for ($i = $n - 1; $i >= 0; --$i) {
            for ($j = $n - 1; $j >= 0; --$j) {
                if ($matrix[$i][$j] === 1) {
                    $dp[$i][$j][0] = 0;
                    $dp[$i][$j][1] = 0;
                } else {
                    $dp[$i][$j][0] = ($dp[$i][$j + 1][0] ?? 0) + 1;
                    $dp[$i][$j][1] = ($dp[$i + 1][$j][1] ?? 0) + 1;
                    $len           = min($dp[$i][$j][0], $dp[$i][$j][1]);
                    while ($ans[2] <= $len) {
                        if ($dp[$i + $len - 1][$j][0] >= $len && $dp[$i][$j + $len - 1][1] >= $len) {
                            $ans = [$i, $j, $len];
                        }
                        --$len;
                    }
                }
            }
        }

        return $ans[2] === 0 ? [] : $ans;
    }
}