<?php

class Solution
{

    /**
     * @param String[] $words1
     * @param String[] $words2
     * @return Integer
     */
    function countWords($words1, $words2)
    {
        $map1 = [];

        foreach ($words1 as $word) {
            $map1[$word] = isset($map1[$word]) ? $map1[$word] + 1 : 1;
        }

        $ans = 0;
        foreach ($words2 as $word) {
            if (isset($map1[$word]) && $map1[$word] === 1) {
                $map1[$word] = 0;
                ++$ans;
            } elseif (isset($map1[$word]) && $map1[$word] === 0) {
                $map1[$word] = -1;
                --$ans;
            }
        }

        return $ans;
    }
}
