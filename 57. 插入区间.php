<?php

class Solution
{

    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    function insert($intervals, $newInterval)
    {
        if (empty($intervals)) {
            return [$newInterval];
        }
        if ($intervals[0][0] > $newInterval[1]) {
            return array_merge([$newInterval], $intervals);
        }
        if ($intervals[count($intervals) - 1][1] < $newInterval[0]) {
            return array_merge($intervals, [$newInterval]);
        }

        $ans   = [];
        $start = $newInterval[0];
        $end   = $newInterval[1];
        $flag  = true;
        foreach ($intervals as $interval) {
            if ($interval[1] < $newInterval[0] || $interval[0] > $newInterval[1]) {
                if ($interval[0] > $newInterval[1] && $flag) {
                    $ans[] = [$start, $end];
                    $flag  = false;
                }
                $ans[] = $interval;
            } else {
                $start = min($start, $interval[0]);
                $end   = max($end, $interval[1]);
            }
        }
        if ($flag) {
            $ans[] = [$start, $end];
        }

        return $ans;
    }
}