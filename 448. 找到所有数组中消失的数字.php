<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDisappearedNumbers($nums)
    {
        $ans = [];
        $n   = count($nums);
        for ($i = 0; $i < $n; ++$i) {
            $nums[($nums[$i] - 1) % $n] += $n;
        }

        for ($i = 0; $i < $n; ++$i) {
            if ($nums[$i] <= $n) {
                $ans[] = $i + 1;
            }
        }

        return $ans;
    }
}

var_dump((new Solution())->findDisappearedNumbers([4, 3, 2, 7, 8, 2, 3, 1]));