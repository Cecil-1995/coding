<?php

class Solution
{

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function eraseOverlapIntervals($intervals)
    {
        usort(
            $intervals, function ($a, $b){
            if ($a[1] > $b[1]) {
                return -1;
            } elseif ($a[1] < $b[1]) {
                return 1;
            } else {
                if ($a[0] > $b[0]) {
                    return -1;
                } elseif ($a[0] < $b[0]) {
                    return 1;
                } else {
                    return 0;
                }
            }
        }
        );

        $count  = count($intervals);
        $last   = $intervals[0];
        $result = 0;
        for ($i = 1; $i < $count; ++$i) {
            if ($last[0] >= $intervals[$i][1]) {
                $last = $intervals[$i];
            } else {
                if ($last[0] < $intervals[$i][0]) {
                    $last = $intervals[$i];
                }
                ++$result;
            }
        }

        return $result;
    }
}

var_dump((new Solution())->eraseOverlapIntervals([[1,2], [1,2], [1,2] ]));