<?php

class Solution
{

    /**
     * @param Integer[] $forts
     * @return Integer
     */
    function captureForts($forts)
    {
        $last = -1;
        $n    = count($forts);
        $ans  = 0;

        for ($i = 0; $i < $n; ++$i) {
            if ($forts[$i] === 1) {
                $last = $i;
            } elseif ($forts[$i] === -1 && $last !== -1) {
                $ans  = max($ans, $i - $last - 1);
                $last = -1;
            }
        }
        for ($i = $n - 1; $i >= 0; --$i) {
            if ($forts[$i] === 1) {
                $last = $i;
            } elseif ($forts[$i] === -1 && $last !== -1) {
                $ans  = max($ans, $last - $i - 1);
                $last = -1;
            }
        }

        return $ans;
    }
}