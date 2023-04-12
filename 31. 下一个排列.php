<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums)
    {
        $n = count($nums);
        for ($i = $n - 1; $i > 0; --$i) {
            if ($nums[$i] > $nums[$i - 1]) {
                for ($j = $n - 1; $j >= $i; --$j) {
                    if ($nums[$j] > $nums[$i - 1]) {
                        $temp         = $nums[$i - 1];
                        $nums[$i - 1] = $nums[$j];
                        $nums[$j]     = $temp;
                        break;
                    }
                }
                break;
            }
        }

        $left  = $i;
        $right = $n - 1;
        while ($left < $right) {
            $temp         = $nums[$left];
            $nums[$left]  = $nums[$right];
            $nums[$right] = $temp;
            ++$left;
            --$right;
        }

        return null;
    }
}