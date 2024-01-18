<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer[]
     */
    function partitionLabels($s)
    {
        $len = strlen($s);
        $map = [];

        for ($i = 0; $i < $len; ++$i) {
            $map[$s[$i]] = $i;
        }

        $ans = [];
        $i   = 0;
        $sum = 0;
        while ($i < $len) {
            $left  = $i;
            $right = $map[$s[$i]];
            while ($left < $right) {
                $right = max($right, $map[$s[$left]]);
                ++$left;
            }
            $i     = $left + 1;
            $ans[] = $i - $sum;
            $sum   += $i - $sum;
        }

        return $ans;
    }
}