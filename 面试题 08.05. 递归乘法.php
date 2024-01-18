<?php

class Solution
{

    /**
     * @param Integer $A
     * @param Integer $B
     * @return Integer
     */
    function multiply($A, $B)
    {
        if ($A > $B) {
            $C = $A;
            $A = $B;
            $B = $C;
        }
        if ($A === 0) {
            return 0;
        } elseif ($A === 1) {
            return $B;
        } else {
            return $B + $this->multiply($A - 1, $B);
        }
    }
}