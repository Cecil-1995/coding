<?php

class Solution
{
    public $result  = [];
    public $current = [];

    /**
     * @param String $s
     * @return String[][]
     */
    function partition($s)
    {
        $this->backtrack($s, 0);

        return $this->result;
    }

    function backtrack($s, $start)
    {
        if ($start === strlen($s)) {
            $this->result[] = $this->current;

            return;
        }

        for ($i = $start; $i < strlen($s); ++$i) {
            if (!$this->isPalindrome($s, $start, $i)) {
                continue;
            }

            $this->current[] = substr($s, $start, $i - $start + 1);
            $this->backtrack($s, $i + 1);
            array_pop($this->current);
        }
    }

    function isPalindrome($s, $left, $right)
    {
        while ($left <= $right) {
            if ($s[$left] !== $s[$right]) {
                return false;
            }
            ++$left;
            --$right;
        }

        return true;
    }

}