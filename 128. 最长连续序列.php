<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums)
    {
        $count = 0;
        $map   = [];

        foreach ($nums as $num) {
            $map[$num] = true;
        }

        foreach ($map as $num => $item) {
            if (isset($map[$num - 1])) {
                continue;
            }

            $res = 0;
            while (true) {
                if (!isset($map[$num + $res])) {
                    break;
                }
                ++$res;
            }
            $count = max($count, $res);
        }

        return $count;
    }
}