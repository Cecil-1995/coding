<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isMonotonic($nums)
    {
        $n = count($nums);
        if ($n === 1) {
            return true;
        }

        $flag = 0;
        for ($i = 1; $i < $n; ++$i) {
            $temp = $nums[$i] - $nums[$i - 1];
            if ($flag > 0) {
                if ($temp < 0) {
                    return false;
                }
            } elseif ($flag < 0) {
                if ($temp > 0) {
                    return false;
                }
            } else {
                $flag = $nums[$i] - $nums[$i - 1];
            }
        }

        return true;
    }
}

$a = new Solution();
var_dump($a->isMonotonic([11, 11, 9, 4, 3, 3, 3, 1, -1, -1, 3, 3, 3, 5, 5, 5]));
