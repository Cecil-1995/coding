<?php

class Solution
{

    /**
     * @param Integer[] $start1
     * @param Integer[] $end1
     * @param Integer[] $start2
     * @param Integer[] $end2
     * @return Float[]
     */
    function intersection($start1, $end1, $start2, $end2)
    {





        $k1 = null;
        $k2 = null;
        if ($start1[0] !== $end1[0]) {
            $k1 = ($start1[1]-$end1[1])/ ($start1[0]-$end1[0]);

        }
        if ($start2[0] !== $end2[0]) {
            $k2 = ($start2[1]-$end2[1])/ ($start2[0]-$end2[0]);
        }

        // 如果斜率相同
        if ($k1 === $k2) {
            // 如果b相同
        }

        // 如果b不同

        // 斜率不同


    }
}