<?php

class Solution
{

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function maxVowels($s, $k)
    {
        $map = ['a','e','i','o','u'];
        $count = 0;
        $len = strlen($s);
        $left = $right = 0;
        while ($right-$left<$k && $right < $len) {
            if (in_array($s[$right], $map)) {
                ++$count;
            }
            ++$right;
        }
        $max = $count;

        while ($right < $len) {
            if (in_array($s[$right], $map)) {
                ++$count;
            }
            if (in_array($s[$left], $map)) {
                --$count;
            }
            $max = max($max, $count);

            ++$right;
            ++$left;
        }

        return $max;
    }
}