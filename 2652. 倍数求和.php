<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function sumOfMultiples($n)
    {
        $ans = 0;

        $three = 1;
        $five  = 1;
        $seven = 1;
        while (true) {
            $min = min(3 * $three, 5 * $five, 7 * $seven);
            if ($min > $n) {
                break;
            }
            $ans += $min;
            if (3 * $three === $min) {
                ++$three;
            }
            if (5 * $five === $min) {
                ++$five;
            }
            if (7 * $seven === $min) {
                ++$seven;
            }
        }

        return $ans;
    }
}