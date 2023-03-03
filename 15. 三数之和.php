<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        $result = [];
        sort($nums);
        $n = count($nums);

        $map = [];
        for ($i = 0; $i < $n; ++$i) {
            $map[$nums[$i]] = $i;
        }

        for ($i = 0; $i < $n - 2; ++$i) {
            for ($j = $i + 1; $j < $n - 1; ++$j) {
                $temp = -$nums[$i] - $nums[$j];
                if (isset($map[$temp]) && $map[$temp] >= $j + 1) {
                    $result[] = [$nums[$i], $nums[$j], $temp];
                }
                while ($j + 1 < $n - 1 && $nums[$j] === $nums[$j + 1]) {
                    ++$j;
                }
            }
            while ($i + 1 < $n - 2 && $nums[$i] === $nums[$i + 1]) {
                ++$i;
            }
        }

        return $result;
    }
}