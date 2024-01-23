<?php

class Solution
{

    /**
     * @param Integer $n
     * @param Integer $time
     * @return Integer
     */
    function passThePillow($n, $time)
    {
        $time = $time % (2 * ($n - 1));

        if ($time <= ($n - 1)) {
            return $time + 1;
        } else {
            return $n - $time + $n - 1;
        }
    }
}