<?php

class Solution
{

    /**
     * @param String $rings
     * @return Integer
     */
    function countPoints($rings)
    {
        $map = [];
        for ($i = 0, $len = strlen($rings); $i < $len; $i += 2) {
            $map[$rings[$i + 1]][$rings[$i]] = true;
        }
        $ans = 0;
        foreach ($map as $i => $colors) {
            if (count($colors) === 3) {
                ++$ans;
            }
        }

        return $ans;
    }
}