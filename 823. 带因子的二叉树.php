<?php

class Solution
{

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function numFactoredBinaryTrees($arr)
    {
        $dp  = [];
        $n   = count($arr);
        $ans = 0;
        $mod = pow(10, 9) + 7;
        sort($arr);
        for ($i = 0; $i < $n; ++$i) {
            $dp[$i] = 1;
            for ($left = 0, $right = $i - 1; $left <= $right; ++$left) {
                while ($left <= $right && $arr[$left] * $arr[$right] > $arr[$i]) {
                    --$right;
                }
                if ($left <= $right && $arr[$left] * $arr[$right] === $arr[$i]) {
                    if ($left === $right) {
                        $dp[$i] = ($dp[$i] + $dp[$left] * $dp[$right]) % $mod;
                    } else {
                        $dp[$i] = ($dp[$i] + 2 * $dp[$left] * $dp[$right]) % $mod;
                    }
                }
            }

            $ans = ($ans + $dp[$i]) % $mod;
        }

        return $ans;
    }
}