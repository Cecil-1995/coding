<?php

class Solution
{

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
    function canCompleteCircuit($gas, $cost)
    {
        $n = count($gas);

        $sum    = 0;
        $minSum = 0;
        $start  = 0;
        for ($i = 0; $i < $n; ++$i) {
            $sum += $gas[$i] - $cost[$i];
            if ($sum < $minSum) {
                $start  = $i + 1;
                $minSum = $sum;
            }
        }

        if ($sum < 0 || $start == $n) {
            return -1;
        }

        return $start;
    }
}