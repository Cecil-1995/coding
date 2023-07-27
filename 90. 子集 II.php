<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsetsWithDup($nums)
    {
        sort($nums);
        $ans = [[]];

        foreach ($nums as $k => $num) {
            if ($k === 0 || $num !== $nums[$k - 1]) {
                $this->backtrack($nums, $k, $ans, []);
            }
        }

        return $ans;
    }

    function backtrack(&$nums, $k, &$ans, $current)
    {
        $current[] = $nums[$k];
        $ans[]     = $current;

        for ($i = $k + 1, $count = count($nums); $i < $count; ++$i) {
            if ($i === $k + 1 || $nums[$i] !== $nums[$i - 1]) {
                $this->backtrack($nums, $i, $ans, $current);
            }
        }
    }
}