<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Boolean
     */
    function isPerfectSquare($num)
    {
        if ($num === 1) {
            return true;
        }

        $left  = 1;
        $right = floor($num / 2);

        while ($left <= $right) {
            $mid  = floor(($right - $left) / 2) + $left;
            $item = $mid * $mid;
            if ($item > $num) {
                $right = $mid - 1;
            } elseif ($item < $num) {
                $left = $mid + 1;
            } else {
                return true;
            }
        }

        return false;
    }
}