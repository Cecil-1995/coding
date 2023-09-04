<?php

class Solution
{

    /**
     * @param String $pattern
     * @param String $s
     * @return Boolean
     */
    function wordPattern($pattern, $s)
    {
        $s = explode(' ', $s);
        if (strlen($pattern) !== count($s)) {
            return false;
        }
        $map  = [];
        $map2 = [];
        for ($i = 0; $i < strlen($pattern); ++$i) {
            if (!isset($map[$pattern[$i]]) && !isset($map2[$s[$i]])) {
                $map[$pattern[$i]] = $s[$i];
                $map2[$s[$i]]      = $pattern[$i];
            } elseif ($map[$pattern[$i]] !== $s[$i] || $map2[$s[$i]] !== $pattern[$i]) {
                return false;
            }
        }

        return true;
    }
}