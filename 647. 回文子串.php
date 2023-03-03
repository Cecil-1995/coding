<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function countSubstrings($s)
    {
        $count = 0;
        for ($i = 0; $i < strlen($s); ++$i) {
            $count += $this->sub($s, $i, $i);
            $count += $this->sub($s, $i, $i + 1);
        }

        return $count;
    }

    function sub($s, $left, $right)
    {
        $count = 0;

        while ($left >= 0 && $right <= strlen($s) - 1 && $s[$left] === $s[$right]) {
            ++$count;
            --$left;
            ++$right;
        }

        return $count;
    }
}