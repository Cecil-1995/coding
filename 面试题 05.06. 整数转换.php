<?php

class Solution
{

    /**
     * @param Integer $A
     * @param Integer $B
     * @return Integer
     */
    function convertInteger($A, $B)
    {

        $c = $A ^ $B;
        $c = decbin($c);
        if (strlen($c) > 32) {
            $c = substr($c, 32);
        }

        $ans = 0;
        for ($i = 0; $i < strlen($c); ++$i) {
            if ($c[$i] === '1') {
                ++$ans;
            }
        }

        return $ans;
    }
}