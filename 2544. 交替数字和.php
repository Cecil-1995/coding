<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function alternateDigitSum($n)
    {
        $result = 0;
        if ($n % 2) {
            $flag = false;
        } else {
            $flag = true;
        }
        while ($n != 0) {
            $result += ($flag ? -1 : 1) * ($n % 10);
            $flag   = !$flag;
            $n      = floor($n / 10);
        }

        return $result;
    }
}