<?php

class Solution
{

    /**
     * @param String[] $details
     * @return Integer
     */
    function countSeniors($details)
    {
        $ans = 0;
        foreach ($details as $detail) {
            if (intval(substr($detail, 11, 2)) > 60) {
                ++$ans;
            }
        }

        return $ans;
    }
}