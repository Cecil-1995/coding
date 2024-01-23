<?php

class Solution
{

    /**
     * @param String[] $words
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    function vowelStrings($words, $left, $right)
    {
        $ans = 0;
        for (; $left <= $right; ++$left) {
            $word = $words[$left];
            if (in_array($word[0], ['a', 'e', 'i', 'o', 'u']) && in_array(
                    $word[strlen($word) - 1], ['a', 'e', 'i', 'o', 'u']
                )) {
                ++$ans;
            }
        }

        return $ans;
    }
}