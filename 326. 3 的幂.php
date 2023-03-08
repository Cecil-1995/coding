<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfThree($n)
    {
        while ($n !== 1 && $n >= 3) {
            $n = $n / 3;
        }

        return $n === 1;
    }
}