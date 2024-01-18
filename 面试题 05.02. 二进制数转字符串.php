<?php

class Solution
{

    /**
     * @param Float $num
     * @return String
     */
    function printBin($num)
    {
        $ans = '0.';
        $map = [];
        while ($num) {
            $num *= 2;
            $ans .= floor($num);
            $num = round($num - floor($num), 6);
            if (in_array($num, $map)) {
                return 'ERROR';
            }
            $map[] = $num;
        }

        return $ans;
    }
}