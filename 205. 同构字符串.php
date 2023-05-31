<?php

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isIsomorphic($s, $t)
    {
        $map1 = [];
        $map2 = [];
        for ($i = 0, $len = strlen($s); $i < $len; ++$i) {
            if (isset($map1[$s[$i]]) && $map1[$s[$i]] != $t[$i] || isset($map2[$t[$i]]) && $map2[$t[$i]] != $s[$i]) {
                return false;
            } else {
                $map1[$s[$i]] = $t[$i];
                $map2[$t[$i]] = $s[$i];
            }
        }

        return true;
    }
}