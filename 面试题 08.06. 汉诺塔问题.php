<?php

class Solution
{

    /**
     * @param Integer[] &$A
     * @param Integer[] &$B
     * @param Integer[] &$C
     * @return NULL
     */
    function hanota(&$A, &$B, &$C)
    {
        $this->hanotaN($A, count($A), $C, $B);
    }

    function hanotaN(&$from, $fromN, &$to, &$temp)
    {
        if ($fromN === 0) {
        } elseif ($fromN === 1) {
            array_push($to, array_pop($from));
        } elseif ($fromN === 2) {
            array_push($temp, array_pop($from));
            array_push($to, array_pop($from));
            array_push($to, array_pop($temp));
        } else {
            $this->hanotaN($from, $fromN - 1, $temp, $to);
            array_push($to, array_pop($from));
            $this->hanotaN($temp, $fromN - 1, $to, $from);
        }
    }
}