<?php

class Solution
{

    /**
     * @param Integer[] $gain
     * @return Integer
     */
    function largestAltitude($gain)
    {
        $pre[0] = 0;

        for ($i = 0, $n = count($gain); $i < $n; ++$i) {
            $pre[$i + 1] = $pre[$i] + $gain[$i];
        }

        return max($pre);
    }
}
