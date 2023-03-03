<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums)
    {
        $count = 0;
        $n     = count($nums);

        for ($i = 0; $i < $n; ++$i) {
            if ($nums[$i] === 0) {
                ++$count;
            } elseif ($count) {
                $nums[$i - $count] = $nums[$i];
            }
        }

        for ($i = 0; $i < $count; ++$i) {
            $nums[$n - 1 - $i] = 0;
        }

        return $nums;
    }
}

$a = [0, 1, 0, 3, 12];
var_dump((new Solution())->moveZeroes($a));