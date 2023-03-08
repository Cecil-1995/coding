<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s)
    {
        $len = strlen($s);
        $map = [];

        for ($i = 0; $i < $len; ++$i) {
            $map[$s[$i]] = isset($map[$s[$i]]) ? $map[$s[$i]] + 1 : 1;
        }
        for ($i = 0; $i < $len; ++$i) {
            if ($map[$s[$i]] === 1) {
                return $i;
            }
        }

        return -1;
    }
}