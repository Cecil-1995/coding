<?php

class Solution
{

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height)
    {
        $n             = count($height);
        $left[0]       = $height[0];
        $right[$n - 1] = $height[$n - 1];
        for ($i = 1; $i < $n; ++$i) {
            $left[$i] = $height[$i] > $left[$i - 1] ? $height[$i] : $left[$i - 1];
        }
        for ($i = $n - 2; $i >= 0; --$i) {
            $right[$i] = $height[$i] > $right[$i + 1] ? $height[$i] : $right[$i + 1];
        }

        $ans = 0;
        for ($i = 1; $i < $n - 1; ++$i) {
            $ans += max(min($left[$i - 1], $right[$i + 1]) - $height[$i], 0);
        }

        return $ans;
    }

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap2($height)
    {
        $left     = 0;
        $right    = count($height) - 1;
        $leftMax  = 0;
        $rightMax = 0;

        $ans = 0;
        while ($left <= $right) {
            if ($leftMax < $rightMax) {
                $ans     += max($leftMax - $height[$left], 0);
                $leftMax = max($leftMax, $height[$left]);
                ++$left;
            } else {
                $ans      += max($rightMax - $height[$right], 0);
                $rightMax = max($rightMax, $height[$right]);
                --$right;
            }
        }

        return $ans;
    }
}

var_dump((new Solution())->trap2([2, 0, 2]));