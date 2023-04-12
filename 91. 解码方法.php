<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s)
    {
        $len = strlen($s);
        if ($len === 0) {
            return 0;
        }

        $dp[0] = 1;
        for ($i = 0; $i < $len; ++$i) {
            $dp[$i + 1] = 0;

            if ($s[$i] !== '0') {
                $dp[$i + 1] += $dp[$i];
            }
            if ($i > 1 && 9 < ($s[$i - 1] . $s[$i]) && ($s[$i - 1] . $s[$i]) < 27) {
                $dp[$i + 1] += $dp[$i - 1];
            }
        }

        return $dp[$len];
    }
}