<?php

class Solution
{

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle)
    {
        $n        = count($triangle);
        $dp[0][0] = $triangle[0][0];

        for ($i = 1; $i < $n; ++$i) {
            $dp[$i][0]  = $triangle[$i][0] + $dp[$i - 1][0];
            $dp[$i][$i] = $triangle[$i][$i] + $dp[$i - 1][$i - 1];

            for ($j = 1; $j < $i; ++$j) {
                $dp[$i][$j] = $triangle[$i][$j] + min($dp[$i - 1][$j], $dp[$i - 1][$j - 1]);
            }
        }

        return min($dp[$n - 1]);
    }

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal2($triangle)
    {
        $n     = count($triangle);
        $dp[0] = $triangle[0][0];

        for ($i = 1; $i < $n; ++$i) {
            $last = $dp[0];

            $dp[0] = $triangle[$i][0] + $dp[0];
            for ($j = 1; $j < $i; ++$j) {
                $currLast = $dp[$j];
                $dp[$j]   = $triangle[$i][$j] + min($dp[$j], $last);
                $last     = $currLast;
            }
            $dp[$i] = $triangle[$i][$i] + $last;
        }

        return min($dp);
    }
}