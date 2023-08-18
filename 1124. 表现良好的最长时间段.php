<?php

class Solution
{

    /**
     * @param Integer[] $hours
     * @return Integer
     */
    function longestWPI($hours)
    {
        $ans   = 0;
        $pre   = [0];
        $stack = [0];
        for ($i = 0; $i < count($hours); ++$i) {
            $j       = $i + 1;
            $pre[$j] = $pre[$i] + ($hours[$i] > 8 ? 1 : -1);
            if ($pre[$j] < $pre[$stack[count($stack) - 1]]) {
                $stack[] = $i + 1;
            }
        }

        for ($i = count($hours); $i > 0; --$i) {
            while (!empty($stack) && $pre[$i] > $pre[$stack[count($stack) - 1]]) {
                $top = array_pop($stack);
                $ans = max($ans, $i - $top);
            }
        }

        return $ans;
    }
}