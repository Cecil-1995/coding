<?php

class Solution
{

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n)
    {
        if ($n == 0) {
            return 1;
        }

        if ($n < 0) {
            $flag = true;
            $n    = -$n;
        } else {
            $flag = false;
        }
        if ($n % 2) {
            $temp = $this->myPow($x, floor($n / 2));
            $x    = $temp * $temp * $x;
        } else {
            $temp = $this->myPow($x, $n / 2);
            $x    = $temp * $temp;
        }

        return $flag ? 1 / $x : $x;
    }
}