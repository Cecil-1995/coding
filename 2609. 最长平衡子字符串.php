<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function findTheLongestBalancedSubstring($s)
    {
        $len     = strlen($s);
        $zero    = 0;
        $ans     = 0;
        $tempAns = 0;
        for ($i = 0; $i < $len; ++$i) {
            if ($s[$i] === '0') {
                if ($tempAns !== 0) {
                    $zero = 0;
                }
                ++$zero;
                $tempAns = 0;
            } else {
                if ($zero !== 0) {
                    --$zero;
                    $tempAns += 2;
                    $ans     = max($ans, $tempAns);
                }
            }
        }

        return $ans;
    }
}