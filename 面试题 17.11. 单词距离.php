<?php

class Solution
{

    /**
     * @param String[] $words
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function findClosest($words, $word1, $word2)
    {
        $ans   = PHP_INT_MAX;
        $flag1 = -1;
        $flag2 = -1;
        foreach ($words as $i => $word) {
            if ($word === $word1) {
                if ($flag2 !== -1) {
                    $ans = min($ans, $i - $flag2);
                }
                $flag1 = $i;
            }
            if ($word === $word2) {
                if ($flag1 !== -1) {
                    $ans = min($ans, $i - $flag1);
                }
                $flag2 = $i;
            }
        }

        return $ans;
    }
}