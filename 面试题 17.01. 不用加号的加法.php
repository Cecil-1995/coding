<?php

class Solution
{

    /**
     * @param Integer $a
     * @param Integer $b
     * @return Integer
     */
    function add($a, $b)
    {
        while ($b !== 0) {
            $carry = ($a & $b) << 1;
            $a     = $a ^ $b;
            $b     = $carry;
        }

        return $a;
    }
}