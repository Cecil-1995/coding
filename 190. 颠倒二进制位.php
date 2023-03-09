<?php

class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function reverseBits($n)
    {
        $result = 0;
        for ($i = 0; $i < 32; ++$i) {
            if ($n % 2) {
                $result += pow(2, 32 - $i);
            }
            $n = floor($n / 2);
        }

        return $result;
    }
}