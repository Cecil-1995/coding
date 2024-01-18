<?php

class Solution
{

    /**
     * @param Integer[] $big
     * @param Integer[] $small
     * @return Integer[]
     */
    function shortestSeq($big, $small)
    {
        $count = 0;
        $temp  = [];
        foreach ($small as $num) {
            $temp[$num] = true;
            ++$count;
        }
        $small = $temp;

        $window = [];
        $n      = count($big);
        $left   = 0;
        $right  = 0;
        $ans    = [0, 100000];
        while ($right < $n) {
            if (isset($small[$big[$right]])) {
                $window[$big[$right]] = isset($window[$big[$right]]) ? $window[$big[$right]] + 1 : 1;
            }
            // 收缩
            while (count($window) === $count) {
                if (isset($small[$big[$left]])) {
                    --$window[$big[$left]];
                    if ($window[$big[$left]] === 0) {
                        unset($window[$big[$left]]);
                        if ($ans[1] - $ans[0] > $right - $left) {
                            $ans = [$left, $right];
                        }
                    }
                }
                ++$left;
            }

            ++$right;
        }

        return $ans[1] === 100000 ? [] : $ans;
    }
}