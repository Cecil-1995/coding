<?php

class Solution
{

    /**
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function rangeBitwiseAnd($left, $right)
    {
        // 如果两个数在不同的指数部分的话直接返回0
        if (floor(log($left, 2)) != floor(log($right, 2))) {
            return 0;
        }

        $ans = $left;
        while ($left <= $right) {
            $ans = $ans & $left & $right;
            ++$left;
            --$right;
        }

        return $ans;
    }
}

var_dump((new Solution())->rangeBitwiseAnd(5, 9));