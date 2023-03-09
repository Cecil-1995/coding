<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isHappy($n)
    {
        while (!isset($map[$n])) {
            if ($n === 1) {
                return true;
            }
            $map[$n] = true;
            $newN    = 0;
            while ($n != 0) {
                $newN += ($n % 10) * ($n % 10);
                $n    = floor($n / 10);
            }
            $n = $newN;
        }

        return false;
    }
}

var_dump((new Solution())->isHappy(19));