<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums)
    {
        $ans = [];

        $this->backstack($nums, 0, [], $ans);

        return $ans;
    }

    function backstack($nums, $index, $result, &$ans)
    {
        $ans[] = $result;
        if ($index === count($nums)) {
            return;
        }

        for ($i = $index; $i < count($nums); ++$i) {
            $result[] = $nums[$i];
            $this->backstack($nums, $i + 1, $result, $ans);
            array_pop($result);
        }
    }
}