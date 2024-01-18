<?php

class Solution
{

    /**
     * @param Integer[] $square1
     * @param Integer[] $square2
     * @return Float[]
     */
    function cutSquares($square1, $square2)
    {
        $x1 = $square1[0] + $square1[2] / 2;
        $y1 = $square1[1] + $square1[2] / 2;
        $x2 = $square2[0] + $square2[2] / 2;
        $y2 = $square2[1] + $square2[2] / 2;

        $ans = [0, 0, 0, 0];
        if ($x1 === $x2) {
            // 斜率不存在
            $ans[0] = $x1;
            $ans[1] = min($square1[1], $square2[1]);
            $ans[2] = $x1;
            $ans[3] = max($square1[1] + $square1[2], $square2[1] + $square2[2]);
        } else {
            $k = ($y2 - $y1) / ($x2 - $x1);
            $b = $y1 - $k * $x1;
            if (abs($k) > 1) {
                // x轴不确定，y轴确定
                $ans[1] = min($square1[1], $square2[1]);
                $ans[0] = ($ans[1] - $b) / $k;
                $ans[3] = max($square1[1] + $square1[2], $square2[1] + $square2[2]);
                $ans[2] = ($ans[3] - $b) / $k;
            } else {
                // x轴确定，y轴不确定
                $ans[0] = min($square1[0], $square2[0]);
                $ans[1] = $k * $ans[0] + $b;
                $ans[2] = max($square1[0] + $square1[2], $square2[0] + $square2[2]);
                $ans[3] = $k * $ans[2] + $b;
            }
        }

        $swap = function (&$a, &$b){
            $temp = $a;
            $a    = $b;
            $b    = $temp;
        };

        if ($ans[0] > $ans[2]) {
            $swap($ans[0], $ans[2]);
            $swap($ans[1], $ans[3]);
        }

        return $ans;
    }
}