<?php

class Solution
{

    /**
     * @param Integer $N
     * @param Integer $M
     * @param Integer $i
     * @param Integer $j
     * @return Integer
     */
    function insertBits($N, $M, $i, $j)
    {
        $N    = decbin($N);
        $lenN = strlen($N);
        if ($j >= $lenN) {
            $N    = str_pad($N, $j + 1, '0', STR_PAD_LEFT);
            $lenN = strlen($N);
        }

        $M    = decbin($M);
        $lenM = strlen($M);

        $index = 0;
        for (; $i <= $j; ++$i) {
            $N[$lenN - 1 - $i] = $lenM - 1 - $index >= 0 ? $M[$lenM - 1 - $index] : 0;
            ++$index;
        }

        return bindec($N);
    }
}