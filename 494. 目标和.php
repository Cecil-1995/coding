<?php

class Solution
{
    public $memo = [];

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function findTargetSumWays($nums, $target)
    {
        return $this->backtrack($nums, $target, 0);
    }

    function backtrack($nums, $target, $i)
    {
        if (count($nums) === $i) {
            if ($target === 0) {
                return 1;
            }

            return 0;
        }

        if (isset($this->memo[$target - $nums[$i] . ',' . $i])) {
            return $this->memo[$target - $nums[$i] . ',' . $i];
        }

        $this->memo[$target - $nums[$i] . ',' . $i] = $this->backtrack(
                $nums, $target - $nums[$i], $i + 1
            ) + $this->backtrack(
                $nums, $target + $nums[$i], $i + 1
            );

        return $this->memo[$target - $nums[$i] . ',' . $i];
    }
}

var_dump(
    (new Solution())->findTargetSumWays([10, 32, 4, 24, 7, 35, 42, 13, 45, 4, 0, 47, 40, 48, 23, 45, 31, 9, 11, 20], 30)
);