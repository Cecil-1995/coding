<?php

class Solution
{
    public $result  = [];
    public $current = [];
    public $used    = [];
    public $left    = 0;

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n)
    {
        $n *= 2;
        $this->backtrack($n);

        return $this->result;
    }

    function backtrack($n)
    {
        if (count($this->current) === $n) {
            $this->result[] = implode('', $this->current);

            return;
        }

        for ($i = 0; $i < $n; ++$i) {
            if ($i < $n / 2) {
                $flag = '(';
            } else {
                $flag = ')';
            }
            if ($i - 1 < $n / 2) {
                $last_flag = '(';
            } else {
                $last_flag = ')';
            }

            if (isset($this->used[$i]) && $this->used[$i]) {
                continue;
            }
            if ($i > 0 && $flag === $last_flag && isset($this->used[$i - 1]) && !$this->used[$i - 1]) {
                continue;
            }

            if ($flag === ')' && $this->left === 0) {
                continue;
            }

            // 操作
            $this->current[] = $flag;
            $this->used[$i]  = true;
            if ($flag === '(') {
                ++$this->left;
            } else {
                --$this->left;
            }

            $this->backtrack($n);

            array_pop($this->current);
            $this->used[$i] = false;
            if ($flag === '(') {
                --$this->left;
            } else {
                ++$this->left;
            }
        }
    }
}

var_dump((new Solution())->generateParenthesis(3));