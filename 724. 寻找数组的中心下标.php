<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function pivotIndex($nums)
    {
        $sum = array_sum($nums);

        $index  = -1;
        $preSum = 0;
        foreach ($nums as $i => $num) {
            if ($preSum === $sum - $num - $preSum) {
                $index = $i;
                break;
            } else {
                $preSum += $num;
            }
        }

        return $index;
    }
}