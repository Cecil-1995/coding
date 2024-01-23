<?php

class Solution
{

    /**
     * @param Integer[] $coins
     * @return Integer
     */
    function minCount($coins)
    {
        $ans = 0;
        foreach ($coins as $coin) {
            $ans += ceil($coin / 2);
        }

        return $ans;
    }
}