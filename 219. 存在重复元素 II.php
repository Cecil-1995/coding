<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate2($nums, $k)
    {
        $map = [];
        foreach ($nums as $kk => $v) {
            $map[$v][] = $kk;
        }

        foreach ($map as $items) {
            $before = $items[0];
            for ($i = 1; $i < count($items); ++$i) {
                if (abs($before - $items[$i]) <= $k) {
                    return true;
                }
                $before = $items[$i];
            }
        }

        return false;
    }

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate($nums, $k)
    {
        $windows = [];
        foreach ($nums as $i => $num) {
            if (count($windows) > $k) {
                array_shift($windows);
            }
            if (in_array($num, $windows)) {
                return true;
            }
            $windows[] = $num;
        }

        return false;
    }
}