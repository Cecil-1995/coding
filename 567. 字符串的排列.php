<?php

class Solution
{

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2)
    {
        $windowLen = strlen($s1);
        $map       = [];
        for ($i = 0; $i < $windowLen; ++$i) {
            $map[$s1[$i]] = isset($map[$s1[$i]]) ? ++$map[$s1[$i]] : 1;
        }
        $sum = count($map);

        $start = 0;
        $len   = strlen($s2);
        for ($end = 0; $end < $len; ++$end) {
            if (isset($map[$s2[$end]])) {
                --$map[$s2[$end]];
                if ($map[$s2[$end]] === 0) {
                    --$sum;
                }
            }

            if (($end - $start + 1) === $windowLen) {
                if ($sum === 0) {
                    return true;
                }

                if (isset($map[$s2[$start]])) {
                    ++$map[$s2[$start]];
                    if ($map[$s2[$start]] === 1) {
                        ++$sum;
                    }
                }
                ++$start;
            }
        }

        return false;
    }
}

var_dump(
    (new Solution())->checkInclusion(
        'aa', 'adaa'
    )
);