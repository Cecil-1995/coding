<?php

class Solution
{

    /**
     * @param Integer[] $birth
     * @param Integer[] $death
     * @return Integer
     */
    function maxAliveYear($birth, $death)
    {
        $map = [];
        $dp  = [];
        for ($i = 0; $i <= 102; ++$i) {
            $map[] = 0;
            $dp[]  = 0;
        }

        foreach ($birth as $year) {
            ++$dp[$year - 1900 + 1];
        }
        foreach ($death as $year) {
            --$dp[$year - 1900 + 2];
        }

        $max = 1899;
        for ($i = 1; $i < 102; ++$i) {
            $map[$i] = $map[$i - 1] + $dp[$i];
            if ($map[$i] > $map[$max - 1900 + 1]) {
                $max = $i + 1899;
            }
        }

        return $max;
    }
}