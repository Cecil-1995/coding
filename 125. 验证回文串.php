<?php

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s)
    {
        $left  = 0;
        $right = strlen($s) - 1;

        while ($left <= $right) {
            if (!$this->isFlag($s[$left])) {
                ++$left;
            } elseif (!$this->isFlag($s[$right])) {
                --$right;
            } elseif (strtolower($s[$left]) === strtolower($s[$right])) {
                ++$left;
                --$right;
            } else {
                return false;
            }
        }

        return true;
    }

    function isFlag($char)
    {
        return ('0' <= $char && $char <= '9') || ('a' <= $char && $char <= 'z');
    }
}