<?php

class NumArray
{
    public $start = [];
    public $end   = [];
    public $sum   = 0;

    /**
     * @param Integer[] $nums
     */
    function __construct($nums)
    {
        $this->start[0] = 0;
        for ($i = 1, $count = count($nums); $i < $count; ++$i) {
            $this->start[$i] = $this->start[$i - 1] + $nums[$i - 1];
        }
        $this->end[$count - 1] = 0;
        for ($i = $count - 2; $i >= 0; --$i) {
            $this->end[$i] = $this->end[$i + 1] + $nums[$i + 1];
        }
        $this->sum = array_sum($nums);
    }

    /**
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function sumRange($left, $right)
    {
        return $this->sum - $this->start[$left] - $this->end[$right];
    }
}

/**
 * Your NumArray object will be instantiated and called as such:
 * $obj = NumArray($nums);
 * $ret_1 = $obj->sumRange($left, $right);
 */