<?php

class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height)
    {
        $left  = 0;
        $right = count($height) - 1;
        $l_max = 0;
        $r_max = 0;
        $res   = 0;

        while ($left < $right) {
            $l_max = max($l_max, $height[$left]);
            $r_max = max($r_max, $height[$right]);

            if ($l_max > $r_max) {
                $res += max(0, $r_max - $height[$right]);
                --$right;
            } else {
                $res += max($l_max - $height[$left], 0);
                ++$left;
            }
        }

        return $res;
    }
}