<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfTwo($n)
    {
        return $n < 0 ? false : $n & ($n-1);
    }
}