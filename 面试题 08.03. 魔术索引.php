<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMagicIndex($nums)
    {
        for ($i = 0, $n = count($nums); $i < $n; ++$i) {
            if ($i === $nums[$i]) {
                return $i;
            }
        }

        return -1;
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMagicIndex2($nums)
    {
        return $this->getAnswer($nums, 0, count($nums) - 1);
    }

    function getAnswer($nums, $left, $right)
    {
        if ($left > $right) {
            return -1;
        }
        $middle     = floor($right - ($right - $left) / 2);
        $leftAnswer = $this->getAnswer($nums, $left, $middle - 1);
        if ($leftAnswer !== -1) {
            return $leftAnswer;
        } elseif ($nums[$middle] == $middle) {
            return $middle;
        } else {
            return $this->getAnswer($nums, $middle + 1, $right);
        }
    }
}