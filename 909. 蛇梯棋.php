<?php

class Solution
{

    /**
     * @param Integer[][] $board
     * @return Integer
     */
    function snakesAndLadders($board)
    {
        $n   = count($board);
        $arr = [];

        $flag  = true;
        $index = 1;
        for ($row = $n - 1; $row >= 0; --$row) {
            if ($flag) {
                for ($col = 0; $col < $n; ++$col) {
                    $arr[$index++] = $board[$row][$col];
                }
            } else {
                for ($col = $n - 1; $col >= 0; --$col) {
                    $arr[$index++] = $board[$row][$col];
                }
            }
            $flag = !$flag;
        }

        // 从第一个格子开始走
        $list = [1];
        $map  = [1 => true];
        $ans  = 1;
        for ($i = 1; $i <= 6; ++$i) {
            if ($arr[$i + 1] === -1) {
                // 没有梯子或者🐍
                if (!isset($map[$i + 1])) {
                    $map[$i + 1] = true;
                    $list[]      = $i + 1;
                }
            } else {
                if (!isset($map[$arr[$i + 1]])) {
                    $map[$arr[$i + 1]] = true;
                    $list[]            = $arr[$i + 1];
                }
            }
        }
        if ($list && max($list) >= $n * $n) {
            return $ans;
        }

        while ($list) {
            $items = $list;
            $list  = [];
            ++$ans;

            foreach ($items as $item) {
                for ($i = 1; $i <= 6; ++$i) {
                    if ($arr[$item + $i] === -1) {
                        // 没有梯子或者🐍
                        if (!isset($map[$item + $i])) {
                            $map[$item + $i] = true;
                            $list[]          = $item + $i;
                        }
                    } else {
                        if (!isset($map[$arr[$item + $i]])) {
                            $map[$arr[$item + $i]] = true;
                            $list[]                = $arr[$item + $i];
                        }
                    }
                }
            }

            if ($list && max($list) >= $n * $n) {
                return $ans;
            }
        }

        return -1;
    }
}