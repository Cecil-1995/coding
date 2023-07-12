<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s)
    {
        $map = [];
        $ans = 0;
        for ($i = 0, $count = strlen($s); $i < $count; ++$i) {
            if (isset($map[$s[$i]])) {
                unset($map[$s[$i]]);
                $ans += 2;
            } else {
                $map[$s[$i]] = true;
            }
        }

        return empty($map) ? $ans : $ans + 1;
    }
}