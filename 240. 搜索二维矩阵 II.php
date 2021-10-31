<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target)
    {
        $m = count($matrix);
        if ($m === 0) {
            return false;
        }
        $n = count($matrix[0]);

        $i = 0;
        $j = $n - 1;
        while ($i < $m && $j >= 0) {
            if ($matrix[$i][$j] === $target) {
                return true;
            } elseif ($matrix[$i][$j] > $target) {
                --$j;
            } elseif ($matrix[$i][$j] < $target) {
                ++$i;
            }
        }

        return false;
    }
}

$a = new Solution();
var_dump($a->searchMatrix([[-5]], -5));
