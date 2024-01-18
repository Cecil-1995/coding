<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Integer
     */
    function exchangeBits($num)
    {
        $num = decbin($num);
        $i   = strlen($num) - 1;
        while ($i > 0) {
            $num[$i]     = $num[$i] ^ $num[$i - 1];
            $num[$i - 1] = $num[$i] ^ $num[$i - 1];
            $num[$i]     = $num[$i] ^ $num[$i - 1];
            $i           -= 2;
        }
        if ($i === 0) {
            if ($num[$i] === '1') {
                $num[$i] = '0';
                $num = '1' . $num;
            } else {
                $num[$i] = '0';
            }
        }

        return bindec($num);
    }
}