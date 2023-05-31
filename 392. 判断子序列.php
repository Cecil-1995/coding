<?php

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t)
    {
        $sLen = strlen($s);
        $tLen = strlen($t);
        if ($sLen === 0) {
            return true;
        }

        $index = 0;
        for ($i = 0; $i < $tLen; ++$i) {
            if ($t[$i] === $s[$index]) {
                ++$index;
                if ($index === $sLen) {
                    return true;
                }
            }
        }

        return false;
    }
}