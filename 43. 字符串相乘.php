<?php

class Solution
{

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply($num1, $num2)
    {
        if ($num1 === '0' || $num2 === '0') {
            return '0';
        }
        $add = function ($num1, $num2){
            $ans  = '';
            $temp = 0;

            $i = strlen($num1) - 1;
            $j = strlen($num2) - 1;
            while ($i >= 0 || $j >= 0) {
                if ($i >= 0) {
                    $temp += intval($num1[$i]);
                    --$i;
                }
                if ($j >= 0) {
                    $temp += intval($num2[$j]);
                    --$j;
                }
                $ans  = $temp % 10 . $ans;
                $temp = floor($temp / 10);
            }
            if ($temp) {
                $ans = $temp . $ans;
            }

            return $ans;
        };

        $ans = '';

        $j    = strlen($num2) - 1;
        $zero = 0;
        while ($j >= 0) {
            $item = str_pad('', $zero++, '0');
            $temp = 0;
            $i    = strlen($num1) - 1;
            while ($i >= 0) {
                $temp = intval($num1[$i]) * intval($num2[$j]) + $temp;
                $item = $temp % 10 . $item;
                $temp = floor($temp / 10);
                --$i;
            }
            if ($temp) {
                $item = $temp . $item;
            }

            $ans = $add($ans, $item);
            --$j;
        }

        return $ans;
    }

}

var_dump((new Solution())->multiply('9133', '0'));