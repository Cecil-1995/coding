<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function numTilings($n)
    {
        $dp[1] = 1;
        $dp[2] = 2;
        $dp[3] = 5;

        for ($i = 4; $i <= $n; ++$i) {
            $dp[$i] = (2 * $dp[$i - 1] + $dp[$i - 3]) % (pow(10, 9) + 7);
        }

        return $dp[$n];
    }
}