<?php

class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function hammingWeight($n)
    {
        $res = 0;
        while ($n != 0) {
            $n = $n & ($n - 1);
            ++$res;
        }

        return $res;
    }
}