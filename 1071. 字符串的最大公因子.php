<?php

class Solution
{

    /**
     * @param String $str1
     * @param String $str2
     * @return String
     */
    function gcdOfStrings($str1, $str2)
    {
        if ($str1 . $str2 !== $str2 . $str1) {
            return "";
        }

        return substr($str1, 0, $this->gcd(strlen($str1), strlen($str2)));
    }

    function gcd($a, $b)
    {
        return $a % $b === 0 ? $b : $this->gcd($b, $a % $b);
    }
}