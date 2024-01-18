<?php

class Solution
{

    /**
     * @param String[] $array
     * @return String[]
     */
    function findLongestSubarray($array)
    {
        $n    = count($array);
        $s[0] = 0;
        for ($i = 0; $i < $n; ++$i) {
            $s[$i + 1] = $s[$i] + (is_numeric($array[$i]) ? 1 : -1);
        }

        $start    = 0;
        $length   = 0;
        $first[0] = 0;
        for ($i = 0; $i <= $n; ++$i) {
            if (!isset($first[$s[$i]])) {
                $first[$s[$i]] = $i;
                continue;
            }

            $currLength = $i - $first[$s[$i]];
            if ($first[$s[$i]] !== $i && $currLength > $length) {
                $start  = $first[$s[$i]];
                $length = $currLength;
            }
        }

        return array_slice($array, $start, $length);
    }
}