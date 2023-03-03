<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxCoins($nums)
    {
        $n     = count($nums);
        $nums2 = [1];
        foreach ($nums as $num) {
            $nums2[] = $num;
        }
        $nums2[] = 1;
        $nums    = $nums2;

        $dp = [];
        for ($i = 0; $i < $n + 2; ++$i) {
            $dp[$i][$i] = 0;
        }

        for ($i = $n; $i >= 0; --$i) {
            for ($j = $i + 1; $j < $n + 2; ++$j) {
                for ($k = $i + 1; $k <= $j - 1; ++$k) {
                    $dp[$i][$j] = max(
                        $dp[$i][$j], $dp[$i][$k] + $dp[$k][$j] + $nums[$i] * $nums[$k] * $nums[$j]
                    );
                }
            }
        }

        return $dp[0][$n + 1];
    }
}