<?php

class Solution
{

    /**
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    function maximum($a, $b)
    {
        $k = ($a - $b) >> 63;

        return (1 + $k) * $a - $b * $k;
    }
}

var_dump((new Solution())->maximum(1, 2));