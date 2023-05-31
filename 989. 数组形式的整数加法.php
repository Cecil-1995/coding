<?php

class Solution
{

    /**
     * @param Integer[] $num
     * @param Integer $k
     * @return Integer[]
     */
    function addToArrayForm($num, $k)
    {
        $i    = count($num) - 1;
        $temp = 0;
        while ($i >= 0 && $k != 0) {
            $num[$i] += $k % 10 + $temp;
            $temp    = floor($num[$i] / 10);
            $num[$i] = ($num[$i] % 10);
            $k       = floor($k / 10);
            --$i;
        }

        while ($i >= 0) {
            $num[$i] += $temp;
            $temp    = floor($num[$i] / 10);
            $num[$i] = ($num[$i] % 10);
            --$i;
        }

        while ($k != 0) {
            $tempNum = $k % 10 + $temp;
            $temp    = floor($tempNum / 10);
            $tempNum = ($tempNum % 10);
            $k       = floor($k / 10);
            array_unshift($num, $tempNum);
        }

        if ($temp != 0) {
            array_unshift($num, $temp);
        }

        return $num;
    }
}