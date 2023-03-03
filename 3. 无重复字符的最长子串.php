<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s)
    {
        $max = 0;
        $map = [];

        for ($i = 0, $j = 0; $i < strlen($s) && $j < strlen($s); ++$i) {
            if (!isset($map[$s[$i]])) {
                $max         = max($max, $i - $j + 1);
                $map[$s[$i]] = true;
            } else {
                for (; $j <= $i; ++$j) {
                    if ($s[$j] === $s[$i]) {
                        ++$j;
                        break;
                    } else {
                        unset($map[$s[$j]]);
                    }
                }
            }
        }

        return $max;

    }
}

var_dump((new Solution())->lengthOfLongestSubstring('abcabcbb'));