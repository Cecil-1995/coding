<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function wiggleSort(&$nums)
    {
        rsort($nums);
        $left  = 0;
        $right = count($nums) - 1;
        $ans   = [];
        while ($left < $right) {
            $ans[] = $nums[$left++];
            $ans[] = $nums[$right--];
        }
        if ($left === $right) {
            $ans[] = $nums[$left];
        }
        $nums = $ans;

        return null;
    }

    function wiggleSort2(&$nums)
    {
        for ($i = 1; $i < count($nums); ++$i) {
            if ($i % 2) {
                // 谷
                if ($nums[$i - 1] < $nums[$i]) {
                    $this->swap($nums[$i - 1], $nums[$i]);
                }
            } else {
                // 峰
                if ($nums[$i - 1] > $nums[$i]) {
                    $this->swap($nums[$i - 1], $nums[$i]);
                }
            }
        }

        return null;
    }

    function swap(&$a, &$b)
    {
        $c = $a;
        $a = $b;
        $b = $c;
    }
}