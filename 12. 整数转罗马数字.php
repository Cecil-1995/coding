<?php

class Solution
{

    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num)
    {
        $ans = str_repeat('M', floor($num / 1000));
        $num %= 1000;

        $ans .= str_repeat('CM', floor($num / 900));
        $num %= 900;

        $ans .= str_repeat('D', floor($num / 500));
        $num %= 500;

        $ans .= str_repeat('CD', floor($num / 400));
        $num %= 400;

        $ans .= str_repeat('C', floor($num / 100));
        $num %= 100;

        $ans .= str_repeat('XC', floor($num / 90));
        $num %= 90;

        $ans .= str_repeat('L', floor($num / 50));
        $num %= 50;

        $ans .= str_repeat('XL', floor($num / 40));
        $num %= 40;

        $ans .= str_repeat('X', floor($num / 10));
        $num %= 10;

        $ans .= str_repeat('IX', floor($num / 9));
        $num %= 9;

        $ans .= str_repeat('V', floor($num / 5));
        $num %= 5;

        $ans .= str_repeat('IV', floor($num / 4));
        $num %= 4;

        $ans .= str_repeat('I', floor($num / 1));

        return $ans;
    }
}