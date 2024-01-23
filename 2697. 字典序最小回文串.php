<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function makeSmallestPalindrome($s)
    {
        $left  = 0;
        $right = strlen($s) - 1;

        while ($left < $right) {
            if ($s[$left] !== $s[$right]) {
                if (ord($s[$left]) > ord($s[$right])) {
                    $s[$left] = $s[$right];
                } else {
                    $s[$right] = $s[$left];
                }
            }
            ++$left;
            --$right;
        }

        return $s;
    }
}