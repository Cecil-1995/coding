<?php

class Solution
{

    /**
     * @param String[] $strs
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function findMaxForm($strs, $m, $n)
    {
        for ($j = 0; $j <= $m; ++$j) {
            for ($k = 0; $k <= $n; ++$k) {
                $dp[0][$j][$k] = 0;
            }
        }

        for ($i = 1; $i <= count($strs); ++$i) {
            $zero = $one = 0;
            for ($ii = 0; $ii < strlen($strs[$i - 1]); ++$ii) {
                if ($strs[$i - 1][$ii] === '0') {
                    ++$zero;
                } else {
                    ++$one;
                }
            }

            for ($j = 0; $j <= $m; ++$j) {
                for ($k = 0; $k <= $n; ++$k) {
                    if ($j < $zero || $k < $one) {
                        $dp[$i][$j][$k] = $dp[$i - 1][$j][$k];
                    } else {
                        $dp[$i][$j][$k] = max($dp[$i - 1][$j][$k], $dp[$i - 1][$j - $zero][$k - $one] + 1);
                    }
                }
            }
        }

        return $dp[count($strs)][$m][$n];
    }
}

var_dump((new Solution())->findMaxForm(["10", "0001", "111001", "1", "0"], 5, 3));