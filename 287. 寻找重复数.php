<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findDuplicate($nums)
    {
        $left  = 1;
        $right = count($nums) - 1;

        while ($left < $right) {
            $middle = floor($right - ($right - $left) / 2);

            $count = 0;
            foreach ($nums as $num) {
                if ($num <= $middle) {
                    ++$count;
                }
            }

            if ($middle < $count) {
                $right = $middle;
            } else {
                $left = $middle + 1;
            }
        }

        return $left;
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findDuplicate2($nums)
    {
        $slow = $fast = 0;
        $slow = $nums[$slow];
        $fast = $nums[$nums[$fast]];

        while ($slow !== $fast) {
            $slow = $nums[$slow];
            $fast = $nums[$nums[$fast]];
        }

        $fast = 0;
        while ($slow !== $fast) {
            $slow = $nums[$slow];
            $fast = $nums[$fast];
        }

        return $fast;
    }
}