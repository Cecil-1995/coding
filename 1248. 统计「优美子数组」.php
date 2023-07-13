<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function numberOfSubarrays($nums, $k)
    {
        $window = [];
        $count  = 0;
        $ans    = 0;

        $left  = 1;
        $right = 1;
        foreach ($nums as $i => $num) {
            $window[] = $num;
            if ($num % 2) {
                ++$count;
            }

            if ($count === $k) {
                while ($window[0] % 2 === 0) {
                    ++$left;
                    array_shift($window);
                }

                if (isset($nums[$i + 1]) && $nums[$i + 1] % 2 === 0) {
                    ++$right;
                } else {
                    $ans   += ($left * $right);
                    $left  = 1;
                    $right = 1;
                    array_shift($window);
                    --$count;
                }
            }
        }

        return $ans;
    }

    function numberOfSubarrays2($nums, $k)
    {
        $left    = $right = 0;
        $count   = count($nums);
        $ans     = 0;
        $current = 0;

        while ($right < $count) {
            if ($nums[$right] % 2) {
                ++$current;
            }

            if ($current === $k) {
                $l = $r = 1;
                while ($nums[$left++] % 2 === 0) {
                    ++$l;
                }

                while (++$right < $count && $nums[$right] % 2 === 0) {
                    ++$r;
                }
                --$right;

                $ans += $l * $r;
                --$current;
            }

            ++$right;
        }

        return $ans;
    }
}