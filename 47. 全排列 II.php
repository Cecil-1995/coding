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
    function permuteUnique($nums)
    {
        sort($nums);
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
            if (isset($this->used[$i]) && $this->used[$i]) {
                continue;
            }

            if ($i > 0 && $nums[$i] === $nums[$i - 1] && isset($this->used[$i - 1]) && !$this->used[$i - 1]) {
                continue;
            }

            // 选择
            $this->current[] = $nums[$i];
            $this->used[$i]  = true;

            // 递归
            $this->backtrack($nums);

            // 撤销选择
            array_pop($this->current);
            $this->used[$i] = false;
        }

    }
}

var_dump((new Solution())->permuteUnique([1, 1, 2, 2]));