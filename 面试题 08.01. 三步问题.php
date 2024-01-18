<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function waysToStep($n)
    {
        $one   = 1;
        $two   = 2;
        $three = 4;
        if ($n === 1) {
            return $one;
        }
        if ($n === 2) {
            return $two;
        }
        if ($n === 3) {
            return $three;
        }
        for ($i = 4; $i <= $n; ++$i) {
            $four  = ($one + $two + $three) % 1000000007;
            $one   = $two;
            $two   = $three;
            $three = $four;
        }

        return $three;
    }
}