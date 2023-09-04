<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return String[]
     */
    function summaryRanges($nums)
    {
        if (count($nums) === 0) {
            return [];
        }
        $ans  = [];
        $item = $nums[0];

        for ($i = 1; $i < count($nums); ++$i) {
            if ($nums[$i] === $nums[$i - 1] + 1) {
                // 继续区间
                if (substr($item, -1) !== '>') {
                    $item .= '->';
                }
            } else {
                // 新区间
                if (substr($item, -1) === '>') {
                    $item .= $nums[$i - 1];
                }
                $ans[] = strval($item);
                $item  = $nums[$i];
            }
        }

        if (substr($item, -1) === '>') {
            $item .= $nums[$i - 1];
        }
        $ans[] = strval($item);

        return $ans;
    }
}