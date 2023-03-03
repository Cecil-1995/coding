<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums)
    {
        $curr  = '';
        $count = 0;
        for ($i = 0; $i < count($nums); ++$i) {
            if ($count === 0) {
                ++$count;
                $curr = $nums[$i];
            } elseif ($nums[$i] === $curr) {
                ++$count;
            } else {
                --$count;
            }

            if ($count === 0) {
                $curr = '';
            }
        }

        return $curr;
    }
}

var_dump((new Solution())->majorityElement([2,2,1,1,1,2,2]));