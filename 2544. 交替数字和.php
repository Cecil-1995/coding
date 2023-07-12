<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function alternateDigitSum($n)
    {
        $a    = 0;
        $b    = 0;
        $flag = true;
        while ($n != 0) {
            if ($flag) {
                $a += $n % 10;
            } else {
                $b += $n % 10;
            }

            $n    = floor($n / 10);
            $flag = !$flag;
        }

        if ($flag) {
            return $b - $a;
        } else {
            return $a - $b;
        }
    }
}