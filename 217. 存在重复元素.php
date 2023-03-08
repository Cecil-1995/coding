<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function containsDuplicate($nums)
    {
        foreach ($nums as $num) {
            if (isset($map[$num])) {
                return true;
            }
            $map[$num] = true;
        }

        return false;
    }
}