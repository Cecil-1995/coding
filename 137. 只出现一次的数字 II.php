<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums)
    {
        $map = [];
        foreach ($nums as $num) {
            $map[$num] = isset($map[$num]) ? ++$map[$num] : 1;
        }
        foreach ($map as $i => $num) {
            if ($num === 1) {
                return $i;
            }
        }

        return 0;
    }
}