<?php

class Solution
{

    /**
     * @param Integer $length
     * @param Integer $width
     * @param Integer $height
     * @param Integer $mass
     * @return String
     */
    function categorizeBox($length, $width, $height, $mass)
    {
        $area = $length * $width * $height;
        $flag = 'Neither';
        if ($length >= 10000 || $width >= 10000 || $height >= 10000 || $mass >= 10000 || $area >= pow(10, 9)) {
            $flag = 'Bulky';
        }
        if ($mass >= 100) {
            if ($flag !== 'Neither') {
                $flag = 'Both';
            } else {
                $flag = 'Heavy';
            }
        }

        return $flag;
    }
}