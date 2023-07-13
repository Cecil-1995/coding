<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums)
    {
        $index = 1;
        $num   = $nums[0];
        $c     = 1;
        for ($i = 1, $count = count($nums); $i < $count; ++$i) {
            if ($nums[$i] === $num) {
                ++$c;
            } else {
                $num = $nums[$i];
                $c   = 1;
            }
            if ($c <= 2) {
                $nums[$index++] = $nums[$i];
            }
        }

        return $index;
    }
}