<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    function countDigits($num)
    {
        $ans  = 0;
        $temp = $num;
        while ($temp) {
            if ($num % ($temp % 10) === 0) {
                ++$ans;
            }
            $temp = floor($temp / 10);
        }

        return $ans;
    }
}