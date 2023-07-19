<?php

class Solution
{

    /**
     * @param String $num
     * @param Integer $k
     * @return String
     */
    function removeKdigits($num, $k)
    {
        $kk    = $k;
        $len   = strlen($num);
        $stack = [];

        for ($i = 0; $i < $len; ++$i) {
            while (!empty($stack) && $num[$i] < $stack[count($stack) - 1] && $k > 0) {
                array_pop($stack);
                --$k;
            }
            $stack[] = $num[$i];
        }

        $stack = array_slice($stack, 0, $len - $kk);
        $stack = ltrim(implode('', $stack), '0');

        return empty($stack) ? '0' : $stack;
    }
}