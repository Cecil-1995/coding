<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix)
    {
        $row = count($matrix);
        if ($row === 0) {
            return null;
        }
        $col = count($matrix[0]);
        if ($col === 0) {
            return null;
        }

        // 将每行翻转
        for ($i = 0; $i < $row; ++$i) {
            $left  = 0;
            $right = $col - 1;
            while ($left < $right) {
                $this->swap($matrix[$i][$left], $matrix[$i][$right]);
                ++$left;
                --$right;
            }
        }

        // 坐下右上旋转轴进行翻转
        for ($top = 0; $top < $row - 1; ++$top) {
            for ($left = 0; $left < $col - 1 - $top; ++$left) {
                $this->swap($matrix[$top][$left], $matrix[$row - 1 - $left][$col - 1 - $top]);
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