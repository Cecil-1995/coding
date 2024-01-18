<?php

class Solution
{

    /**
     * @param Integer $k
     * @return Integer
     */
    function getKthMagicNumber($k)
    {
        $dp[0] = -1;
        $dp[1] = 1;
        $three = 1;
        $five  = 1;
        $seven = 1;
        $i     = 2;
        while ($i++ <= $k) {
            $min  = min(3 * $dp[$three], 5 * $dp[$five], 7 * $dp[$seven]);
            $dp[] = $min;
            if ($min === 3 * $dp[$three]) {
                ++$three;
            }
            if ($min === 5* $dp[$five]) {
                ++$five;
            }
            if ($min === 7 * $dp[$seven]) {
                ++$seven;
            }
        }

        return $dp[$k];
    }
}