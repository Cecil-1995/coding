<?php

class Solution
{

    /**
     * @param Integer $shorter
     * @param Integer $longer
     * @param Integer $k
     * @return Integer[]
     */
    function divingBoard($shorter, $longer, $k)
    {
        if ($k === 0) {
            return [];
        }
        if ($shorter === $longer) {
            return [$shorter * $k];
        }

        $ans = [];
        for ($i = 0; $i <= $k; ++$i) {
            $ans[] = $longer * $i + $shorter * ($k - $i);
        }

        return $ans;
    }
}