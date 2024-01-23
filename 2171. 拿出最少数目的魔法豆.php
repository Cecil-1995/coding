<?php

class Solution
{

    /**
     * @param Integer[] $beans
     * @return Integer
     */
    function minimumRemoval($beans)
    {
        sort($beans);

        $sum = 0;
        $max = 0;
        $n   = count($beans);
        foreach ($beans as $i => $bean) {
            $sum += $bean;
            $max = max($max, $bean * ($n - $i));
        }

        return $sum - $max;
    }
}