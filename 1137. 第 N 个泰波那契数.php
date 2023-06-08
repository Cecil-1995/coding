<?php

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function tribonacci($n)
    {
        $a[0] = 0;
        $a[1] = 1;
        $a[2] = 1;
        if ($n < 3) {
            return $a[$n];
        }
        for ($i = 3; $i <= $n; ++$i) {
            $a[$i % 3] = $a[($i - 1) % 3] + $a[($i - 2) % 3] + $a[$i % 3];
        }

        return $a[$n % 3];
    }
}
