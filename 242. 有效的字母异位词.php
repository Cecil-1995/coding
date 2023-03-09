<?php

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t)
    {
        $map = [];
        for ($i = 0; $i < strlen($s); ++$i) {
            $map[$s[$i]] = isset($map[$s[$i]]) ? $map[$s[$i]] + 1 : 1;
        }

        for ($i = 0; $i < strlen($t); ++$i) {
            if (isset($map[$t[$i]])) {
                if ($map[$t[$i]] === 1) {
                    unset($map[$t[$i]]);
                } else {
                    --$map[$t[$i]];
                }
            } else {
                return false;
            }
        }

        return empty($map);
    }
}