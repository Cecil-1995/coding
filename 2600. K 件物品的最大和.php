<?php

class Solution
{

    /**
     * @param Integer $numOnes
     * @param Integer $numZeros
     * @param Integer $numNegOnes
     * @param Integer $k
     * @return Integer
     */
    function kItemsWithMaximumSum($numOnes, $numZeros, $numNegOnes, $k)
    {
        $result = min($numOnes, $k);
        $k      -= $numOnes;
        if ($k > 0) {
            $k -= $numZeros;
        }
        if ($k > 0) {
            $result -= $k;
        }

        return $result;
    }
}