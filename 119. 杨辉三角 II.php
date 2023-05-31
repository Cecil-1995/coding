<?php

class Solution
{

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex)
    {
        $dp[0] = [1];
        $dp[1] = [1, 1];
        for ($i = 2; $i <= $rowIndex; ++$i) {
            $dp[$i] = [1];
            for ($j = 0; $j < count($dp[$i - 1]) - 1; ++$j) {
                $dp[$i][] = $dp[$i - 1][$j] + $dp[$i - 1][$j + 1];
            }
            $dp[$i][] = 1;
        }

        return $dp[$rowIndex];
    }
}