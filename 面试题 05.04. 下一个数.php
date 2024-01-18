<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Integer[]
     */
    function findClosedNumbers($num)
    {
        $num = decbin($num);
        if (strlen($num) < 32) {
            $num = str_pad($num, 32, '0', STR_PAD_LEFT);
        }
        $len = strlen($num);
        $max = $num;
        $min = $num;
        $ans = [-1, -1];

        // 第0位为符号位，不要交换
        for ($i = 31; $i > 1; --$i) {
            if ($max[$len - 32 + $i] === '1' && $max[$len - 32 + $i - 1] === '0') {
                $max[$len - 32 + $i]     = $max[$len - 32 + $i] ^ $max[$len - 32 + $i - 1];
                $max[$len - 32 + $i - 1] = $max[$len - 32 + $i] ^ $max[$len - 32 + $i - 1];
                $max[$len - 32 + $i]     = $max[$len - 32 + $i] ^ $max[$len - 32 + $i - 1];

                // 1 右移，0 左移
                $left  = $len - 32 + $i;
                $right = $len - 1;
                while ($left < $right) {
                    if ($max[$left] === '1' && $max[$right] === '0') {
                        $max[$left]  = $max[$left] ^ $max[$right];
                        $max[$right] = $max[$left] ^ $max[$right];
                        $max[$left]  = $max[$left] ^ $max[$right];
                    } elseif ($max[$left] === '1') {
                        --$right;
                    } else {
                        ++$left;
                    }
                }

                $ans[0] = bindec($max);
                break;
            }
        }

        for ($i = 31; $i > 1; --$i) {
            if ($min[$len - 32 + $i] === '0' && $min[$len - 32 + $i - 1] === '1') {
                $min[$len - 32 + $i]     = $min[$len - 32 + $i] ^ $min[$len - 32 + $i - 1];
                $min[$len - 32 + $i - 1] = $min[$len - 32 + $i] ^ $min[$len - 32 + $i - 1];
                $min[$len - 32 + $i]     = $min[$len - 32 + $i] ^ $min[$len - 32 + $i - 1];

                // 1 左移，0 右移
                $left  = $len - 32 + $i;
                $right = $len - 1;
                while ($left < $right) {
                    if ($min[$left] === '0' && $min[$right] === '1') {
                        $min[$left]  = $min[$left] ^ $min[$right];
                        $min[$right] = $min[$left] ^ $min[$right];
                        $min[$left]  = $min[$left] ^ $min[$right];
                    } elseif ($min[$left] === '0') {
                        --$right;
                    } else {
                        ++$left;
                    }
                }

                $ans[1] = bindec($min);
                break;
            }
        }

        return $ans;
    }
}