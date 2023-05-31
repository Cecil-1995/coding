<?php

class Solution
{

    /**
     * @param Integer $num
     * @return Integer
     */
        function maximumSwap($num)
        {
            $arr = [];
            while ($num) {
                array_unshift($arr, $num % 10);
                $num = floor($num / 10);
            }

            for ($i = 0, $count = count($arr); $i < $count - 1; ++$i) {
                $max   = -1;
                $index = -1;
                for ($j = $i + 1; $j < $count; ++$j) {
                    if ($arr[$j] >= $max) {
                        $max   = $arr[$j];
                        $index = $j;
                    }
                }
                if ($arr[$i] < $max) {
                    $arr[$index] = $arr[$i];
                    $arr[$i]     = $max;
                    break;
                }
            }

            $result = 0;
            for ($i = $count - 1; $i >= 0; --$i) {
                $result += $arr[$i] * pow(10, $count - $i - 1);
            }

            return $result;
        }
}