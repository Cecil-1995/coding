<?php

class Solution
{

    /**
     * @param String[] $words
     * @param String $s
     * @return Boolean
     */
    function isAcronym($words, $s)
    {
        if (count($words) < strlen($s)) {
            return false;
        }

        foreach ($words as $i => $word) {
            if ($word[0] !== $s[$i]) {
                return false;
            }
        }

        return true;
    }
}