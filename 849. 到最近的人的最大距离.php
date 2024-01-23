<?php

class Solution
{

    /**
     * @param Integer[] $seats
     * @return Integer
     */
    function maxDistToClosest($seats)
    {
        $dp = [];

        $last = -1;
        for ($i = 0; $i < count($seats); ++$i) {
            if ($seats[$i] === 0) {
                if ($last !== -1) {
                    ++$last;
                    $dp[$i] = $last;
                }
            } else {
                $last = 0;
            }
        }

        $last = -1;
        for ($i = count($seats) - 1; $i >= 0; --$i) {
            if ($seats[$i] === 0) {
                if ($last !== -1) {
                    ++$last;
                    $dp[$i] = min($last, $dp[$i] ?? PHP_INT_MAX);
                }
            } else {
                $last = 0;
            }
        }

        return max($dp);
    }
}