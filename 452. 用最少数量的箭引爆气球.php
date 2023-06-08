<?php

class Solution
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function findMinArrowShots($points)
    {
        usort(
            $points, function ($a, $b){
            if ($a[0] > $b[0]) {
                return 1;
            } elseif ($a[0] < $b[0]) {
                return -1;
            } else {
                if ($a[1] > $b[1]) {
                    return 1;
                } elseif ($a[1] < $b[1]) {
                    return -1;
                } else {
                    return 0;
                }
            }
        }
        );

        $left   = $points[0][0];
        $right  = $points[0][1];
        $result = 1;
        foreach ($points as $point) {
            if ($point[0] <= $right) {
                $left  = max($left, $point[0]);
                $right = min($right, $point[1]);
            } else {
                $left  = $point[0];
                $right = $point[1];
                ++$result;
            }
        }

        return $result;
    }
}