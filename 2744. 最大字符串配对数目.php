<?php

class Solution
{

    /**
     * @param String[] $words
     * @return Integer
     */
    function maximumNumberOfStringPairs($words)
    {
        $rWords = [];
        foreach ($words as $word) {
            $rWord = $this->traverse($word);
            if ($word !== $rWord) {
                $rWords[$rWord] = true;
            }
        }

        $ans = 0;
        foreach ($words as $word) {
            if (isset($rWords[$word])) {
                ++$ans;
            }
        }

        return $ans / 2;
    }

    function traverse($word)
    {
        $left  = 0;
        $right = strlen($word) - 1;
        while ($left < $right) {
            $temp         = $word[$left];
            $word[$left]  = $word[$right];
            $word[$right] = $temp;
            ++$left;
            --$right;
        }

        return $word;
    }
}