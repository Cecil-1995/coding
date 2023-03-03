<?php

class Solution
{
    public $result  = [];
    public $current = [];
    public $used    = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums)
    {
        $this->backtrack($nums);

        return $this->result;
    }

    function backtrack($nums)
    {
        if (count($this->current) === count($nums)) {
            $this->result[] = $this->current;

            return;
        }

        for ($i = 0; $i < count($nums); ++$i) {
            if (isset($this->used[$nums[$i]]) && $this->used[$nums[$i]]) {
                continue;
            }

            // 选择
            $this->current[]       = $nums[$i];
            $this->used[$nums[$i]] = true;

            // 递归
            $this->backtrack($nums);

            // 撤销选择
            array_pop($this->current);
            $this->used[$nums[$i]] = false;
        }
    }
}