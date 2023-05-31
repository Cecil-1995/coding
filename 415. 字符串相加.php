<?php

class Solution
{

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function addStrings($num1, $num2)
    {
        $i = strlen($num1) - 1;
        $j = strlen($num2) - 1;

        $result = '';
        $temp   = 0;
        while ($i >= 0 && $j >= 0) {
            $temp   = $num1[$i] + $num2[$j] + $temp;
            $result = ($temp % 10) . $result;
            $temp   = floor($temp / 10);
            --$i;
            --$j;
        }
        while ($i >= 0) {
            $temp   = $num1[$i] + $temp;
            $result = ($temp % 10) . $result;
            $temp   = floor($temp / 10);
            --$i;
        }
        while ($j >= 0) {
            $temp   = $num2[$j] + $temp;
            $result = ($temp % 10) . $result;
            $temp   = floor($temp / 10);
            --$j;
        }
        if ($temp != 0) {
            $result = $temp . $result;
        }

        return $result;
    }
}