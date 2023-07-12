<?php

class Solution
{

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea($heights)
    {
        array_push($heights, -1);
        array_unshift($heights, -1);

        $stack = [0];
        $res   = 0;
        for ($i = 1, $len = count($heights); $i < $len; ++$i) {
            while ($heights[$i] < $heights[$stack[count($stack) - 1]]) {
                $curHeight = $heights[array_pop($stack)];
                $curWidth  = $i - $stack[count($stack) - 1] - 1;
                $res       = max($res, $curHeight * $curWidth);
            }

            $stack[] = $i;
        }

        return $res;
    }
}