<?php

class Solution
{

    /**
     * @param Integer[] $bills
     * @return Boolean
     */
    function lemonadeChange($bills)
    {
        $five = $ten = 0;
        foreach ($bills as $bill) {
            if ($bill === 5) {
                ++$five;
            } elseif ($bill === 10) {
                if ($five === 0) {
                    return false;
                }
                ++$ten;
                --$five;
            } else {
                if ($five === 0) {
                    return false;
                }

                if ($ten > 0) {
                    --$ten;
                    --$five;
                } else {
                    if ($five >= 3) {
                        $five -= 3;
                    } else {
                        return false;
                    }
                }
            }
        }

        return true;
    }
}