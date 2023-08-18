<?php

class Solution
{

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function sumOddLengthSubarrays($arr)
    {
        $ans    = 0;
        $preSum = [0];
        for ($i = 0; $i < count($arr); ++$i) {
            $preSum[] = $preSum[$i] + $arr[$i];
        }

        for ($i = 0; $i < count($arr); ++$i) {
            for ($len = 1; $len < count($arr) - $i + 1; $len += 2) {
                $ans += $preSum[$i+$len]-$preSum[$i];
            }
        }

        return $ans;


        //        $sum = 0;
        //        $n   = count($arr);
        //        $max = $n % 2 ? $n : $n - 1;
        //
        //        for ($i = 0; $i < $n; ++$i) {
        //            1+3+5+7+9
        //            $left = $i;
        //            $right = $n-1-$i;
        //
        //        }
        //
        //        return $sum;
    }
}