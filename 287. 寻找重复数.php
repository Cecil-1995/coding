<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findDuplicate($nums)
    {
        for ($i = 0; $i < count($nums); ++$i) {
            for ($j = $i+1; $j < count($nums); ++$j) {
                if ($nums[$i] === $nums[$j]) {
                    return $nums[$i];
                }

            }
        }
    }
}