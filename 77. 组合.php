<?php

class Solution
{
    public $result  = [];
    public $current = [];

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k)
    {
        $this->backtrack($n, $k, 1);

        return $this->result;
    }

    function backtrack($n, $k, $start)
    {
        if (count($this->current) === $k) {
            $this->result[] = $this->current;

            return;
        }

        for (; $start <= $n; ++$start) {
            // 选择
            $this->current[] = $start;
            // 递归
            $this->backtrack($n, $k, $start + 1);
            // 撤销
            array_pop($this->current);
        }

    }
}