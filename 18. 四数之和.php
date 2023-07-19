<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target)
    {
        sort($nums);
        $ans   = [];
        $count = count($nums);

        for ($i = 0; $i < $count - 3; ++$i) {
            if ($i !== 0 && $nums[$i] === $nums[$i - 1]) {
                continue;
            }
            for ($j = $i + 1; $j < $count - 2; ++$j) {
                if ($j !== $i + 1 && $nums[$j] === $nums[$j - 1]) {
                    continue;
                }
                $left  = $j + 1;
                $right = $count - 1;
                while ($left < $right) {
                    $sum = $nums[$i] + $nums[$j] + $nums[$left] + $nums[$right];
                    if ($sum > $target) {
                        while ($left < $right && $nums[$right] === $nums[--$right]) {
                        }
                    } elseif ($sum < $target) {
                        while ($left < $right && $nums[$left] === $nums[++$left]) {
                        }
                    } else {
                        $ans[] = [$nums[$i], $nums[$j], $nums[$left], $nums[$right]];
                        while ($left < $right && $nums[$right] === $nums[--$right]) {
                        }
                        while ($left < $right && $nums[$left] === $nums[++$left]) {
                        }
                    }
                }
            }
        }

        return $ans;
    }
}