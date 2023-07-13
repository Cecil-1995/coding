<?php

class Solution
{

    /**
     * @param Integer[] $g
     * @param Integer[] $s
     * @return Integer
     */
    function findContentChildren($g, $s)
    {
        sort($g);
        sort($s);

        $ans = 0;
        $i   = 0;
        foreach ($s as $item) {
            if (isset($g[$i]) && $item >= $g[$i]) {
                ++$ans;
                ++$i;
            }
        }

        return $ans;
    }
}