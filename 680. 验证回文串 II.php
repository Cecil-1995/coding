<?php

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    function validPalindrome($s)
    {
        $function = function ($s){
            $left  = 0;
            $right = strlen($s) - 1;

            while ($left <= $right) {
                if ($s[$left] === $s[$right]) {
                    ++$left;
                    --$right;
                } else {
                    return false;
                }
            }

            return true;
        };

        $len   = strlen($s);
        $left  = 0;
        $right = $len - 1;

        while ($left <= $right) {
            if ($s[$left] === $s[$right]) {
                ++$left;
                --$right;
            } else {
                // 不相等，删除左边或者右边
                return $function(substr($s, $left + 1, $right - $left)) || $function(substr($s, $left, $right - $left));
            }
        }

        return true;
    }
}