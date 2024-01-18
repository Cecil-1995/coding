<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function missingTwo($nums)
    {
        $nums = array_merge($nums, [0, 0]);
        $n    = count($nums);
        $i    = 0;
        while ($i < $n) {
            if ($nums[$i] !== 0 && $nums[$i] !== $nums[$nums[$i] - 1]) {
                $this->swap($nums[$i], $nums[$nums[$i] - 1]);
            } else {
                ++$i;
            }
        }
        $ans = [];
        foreach ($nums as $i => $num) {
            if ($num === 0) {
                $ans[] = $i + 1;
            }
        }

        return $ans;
    }

    function swap(&$a, &$b)
    {
        $temp = $a;
        $a    = $b;
        $b    = $temp;
    }
}