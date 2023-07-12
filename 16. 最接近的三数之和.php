<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target)
    {
        $ans = $nums[0] + $nums[1] + $nums[2];
        sort($nums);

        for ($i = 0, $count = count($nums); $i < $count; ++$i) {
            $start = $i + 1;
            $end   = $count - 1;

            while ($start < $end) {
                $sum = $nums[$start] + $nums[$end] + $nums[$i];
                if (abs($sum - $target) < abs($ans - $target)) {
                    $ans = $sum;
                }

                if ($sum > $target) {
                    --$end;
                } elseif ($sum < $target) {
                    ++$start;
                } else {
                    return $sum;
                }
            }
        }

        return $ans;
    }
}