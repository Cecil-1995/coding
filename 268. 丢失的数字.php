<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function missingNumber($nums)
    {
        $n = count($nums);

        $flag = false;
        $index = 0;
        for ($i = 0; $i < $n-1; ++$i) {
            if ($nums[$index] === $n) {
                $flag = true;
                ++$index;
                continue;
            }
            $index = $nums[$index];
            $nums[$index] = true;
        }



    }
}