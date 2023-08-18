<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums)
    {
        $dp[0] = 0;

        foreach ($nums as $i => $num) {
            for ($j = 1; $j <= $num; ++$j) {
                if (isset($dp[$i + $j])) {
                    $dp[$i + $j] = min($dp[$i + $j], $dp[$i] + 1);
                } else {
                    $dp[$i + $j] = $dp[$i] + 1;
                }

            }
        }

        return $dp[count($nums) - 1];
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump2($nums)
    {
        $end    = 0;
        $ans    = 0;
        $maxPos = 0;
        for ($i = 0; $i < count($nums) - 1; ++$i) {
            $maxPos = max($maxPos, $i + $nums[$i]);
            if ($i === $end) {
                $end = $maxPos;
                ++$ans;
            }
        }

        return $ans;
    }
}