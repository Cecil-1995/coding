<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums)
    {
        $result = [[]];

        foreach ($nums as $num) {
            $temp = $result;
            foreach ($temp as $i => $v) {
                $temp[$i][] = $num;
            }

            $result = array_merge($result, $temp);
        }

        return $result;
    }
}