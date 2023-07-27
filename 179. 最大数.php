<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return String
     */
    function largestNumber($nums)
    {
        usort(
            $nums, function ($a, $b){
            $aString = $a . $b;
            $bString = $b . $a;

            for ($i = 0, $len = strlen($aString); $i < $len; ++$i) {
                if ($aString[$i] > $bString[$i]) {
                    return -1;
                } elseif ($aString[$i] < $bString[$i]) {
                    return 1;
                }
            }

            return 0;
        }
        );

        $ans = '';
        foreach ($nums as $num) {
            if ($ans === '' && $num === 0) {
                continue;
            }
            $ans .= $num;
        }

        return empty($ans) ? '0' : $ans;
    }

    function intToArr($a)
    {
        $arr = [];
        while ($a) {
            array_unshift($arr, $a % 10);
            $a = floor($a / 10);
        }

        return $arr;
    }
}

var_dump((new Solution())->largestNumber([3, 30, 34, 5, 9]));