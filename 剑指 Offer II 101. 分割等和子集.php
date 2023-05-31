<?php

class Solution
{
    public $map = [];

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

        foreach ($nums as $k => $num) {
            if (!isset($this->map[$sum - $num . '.' . $k])) {
                $this->map[$sum - $num . '.' . $k] = $this->backtrack($nums, $sum - $num, $k);
            }
            if ($this->map[$sum - $num . '.' . $k]) {
                return true;
            }
        }

        return false;
    }

    function backtrack($nums, $sum, $start)
    {
        if (isset($this->map[$sum . '.' . $start])) {
            return $this->map[$sum . '.' . $start];
        }
        if ($sum == 0) {
            return true;
        } elseif ($sum < 0) {
            return false;
        }

        foreach ($nums as $k => $num) {
            if ($k <= $start) {
                continue;
            }
            // 选择
            $sum                            -= $num;
            $this->map[$sum . '.' . $start] = $this->backtrack($nums, $sum, $k);
            if ($this->map[$sum . '.' . $start]) {
                return true;
            }
            // 撤销选择
            $sum += $num;
        }

        return false;
    }
}