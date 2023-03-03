<?php

class Solution
{
    public $result     = [];
    public $current    = [];
    public $currentSum = 0;
    public $used       = [];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($candidates, $target)
    {
        sort($candidates);
        $this->backtrack($candidates, $target, 0);

        return $this->result;
    }

    function backtrack($candidates, $target, $start)
    {
        if ($this->currentSum === $target) {
            $this->result[] = $this->current;

            return;
        }
        if ($this->currentSum > $target) {
            return;
        }

        for ($i = $start; $i < count($candidates); ++$i) {
            if ($i > 0 && $candidates[$i] === $candidates[$i - 1] && isset($this->used) && !$this->used[$i - 1]) {
                continue;
            }

            // 选择
            $this->current[]  = $candidates[$i];
            $this->currentSum += $candidates[$i];
            $this->used[$i]   = true;

            // 递归
            $this->backtrack($candidates, $target, $i + 1);

            // 撤销
            array_pop($this->current);
            $this->currentSum -= $candidates[$i];
            $this->used[$i]   = false;
        }
    }
}