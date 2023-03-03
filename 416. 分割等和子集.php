<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canPartition($nums)
    {
        $sum = array_sum($nums);
        if ($sum % 2) {
            return false;
        }
        $sum = $sum / 2;

        return $this->sub($nums, $sum, 0);
    }

    function sub($nums, $remain, $start)
    {
        if ($remain === 0) {
            return true;
        }
        if ($remain < 0 || $start === count($nums)) {
            return false;
        }

        for ($i = $start; $i < count($nums); ++$i) {
            $remain -= $nums[$i];
            if ($this->sub($nums, $remain, $i + 1)) {
                return true;
            }
            $remain += $nums[$i];
        }

        return false;
    }
}