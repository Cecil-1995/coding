<?php

class Solution
{
    public $memo = [];

    /**
     * @param Integer $n
     * @return Integer
     */
    function numTrees($n)
    {
        return $this->count(1, $n);
    }

    function count($left, $right)
    {
        if ($left > $right) {
            return 1;
        }
        if (isset($this->memo[$left][$right])) {
            return $this->memo[$left][$right];
        }

        $res = 0;
        for ($i = $left; $i <= $right; ++$i) {
            $this->memo[$left][$i - 1]  = $this->count($left, $i - 1);
            $this->memo[$i + 1][$right] = $this->count($i + 1, $right);
            $res                        += $this->memo[$left][$i - 1] * $this->memo[$i + 1][$right];
        }

        return $res;
    }
}