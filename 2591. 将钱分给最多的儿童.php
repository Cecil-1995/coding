<?php

class Solution
{

    /**
     * @param Integer $money
     * @param Integer $children
     * @return Integer
     */
    function distMoney($money, $children)
    {
        $money -= $children;
        if ($money < 0) {
            return -1;
        }
        $ans        = min(intval(floor($money / 7)), $children);
        $reMoney    = $money - $ans * 7;
        $reChildren = $children - $ans;
        if ($reMoney !== 0) {
            if ($reMoney === 3 && $reChildren === 1 || $reChildren === 0) {
                return $ans - 1;
            }
        }

        return $ans;
    }
}