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
        $n = count($matrix[0]);

        $left  = 0;
        $right = $m * $n - 1;

        while ($left <= $right) {
            $mid  = floor(($right - $left) / 2) + $left;
            $item = $matrix[floor($mid / $n)][$mid - floor($mid / $n) * $n];
            if ($item > $target) {
                $right = $mid - 1;
            } elseif ($item < $target) {
                $left = $mid + 1;
            } else {
                return true;
            }
        }

        return false;
    }
}