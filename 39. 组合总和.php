<?php

class Solution
{

    public $result     = [];
    public $current    = [];
    public $currentSum = 0;

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target)
    {
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
            // 选择
            $this->current[]  = $candidates[$i];
            $this->currentSum += $candidates[$i];

            // 递归
            $this->backtrack($candidates, $target, $i);

            // 撤销
            array_pop($this->current);
            $this->currentSum -= $candidates[$i];
        }

    }
}