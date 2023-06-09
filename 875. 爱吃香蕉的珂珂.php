<?php

class Solution
{

    /**
     * @param Integer[] $piles
     * @param Integer $h
     * @return Integer
     */
    function minEatingSpeed($piles, $h)
    {
        $left  = 1;
        $right = max($piles);

        while ($left <= $right) {
            $middle = floor($left + ($right - $left) / 2);

            $time = 0;
            foreach ($piles as $pile) {
                $time += ceil($pile / $middle);
            }

            if ($time > $h) {
                // 吃不完
                $left = $middle + 1;
            } elseif ($time < $h) {
                // 能吃完
                $right = $middle - 1;
            } else {
                // 刚好吃完
                $right = $middle - 1;
            }
        }

        return $right + 1;
    }
}