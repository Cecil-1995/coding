<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findNumberOfLIS($nums)
    {
        $f   = $g = [];
        $max = 1;
        foreach ($nums as $i => $num) {
            $f[$i] = $g[$i] = 1;
            for ($j = 0; $j < $i; ++$j) {
                if ($nums[$j] < $num) {
                    if ($f[$i] < $f[$j] + 1) {
                        $g[$i] = $g[$j];
                        $f[$i] = $f[$j] + 1;
                    } elseif ($f[$i] == $f[$j] + 1) {
                        $g[$i] += $g[$j];
                    }
                }
            }
            $max = max($max, $f[$i]);
        }

        $ans = 0;
        foreach ($g as $i => $item) {
            if ($f[$i] === $max) {
                $ans += $item;
            }
        }

        return $ans;
    }
}