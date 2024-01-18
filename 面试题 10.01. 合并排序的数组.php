<?php

class Solution
{

    /**
     * @param Integer[] $A
     * @param Integer $m
     * @param Integer[] $B
     * @param Integer $n
     * @return NULL
     */
    function merge(&$A, $m, $B, $n)
    {
        $length = $m + $n - 1;
        while ($m > 0 && $n > 0) {
            if ($A[$m - 1] > $B[$n - 1]) {
                $A[$length] = $A[$m - 1];
                --$m;
            } else {
                $A[$length] = $B[$n - 1];
                --$n;
            }
            --$length;
        }
        while ($n > 0) {
            $A[$length] = $B[$n - 1];
            --$n;
            --$length;
        }

        return null;
    }
}