<?php

class Solution
{

    /**
     * @param String $word1
     * @param String $word2
     * @return String
     */
    function mergeAlternately($word1, $word2)
    {
        $word1Len = strlen($word1);
        $word2Len = strlen($word2);
        $i        = 0;
        $j        = 0;
        $result   = '';
        while ($i < $word1Len && $j < $word2Len) {
            $result .= $word1[$i] . $word2[$j];
            ++$i;
            ++$j;
        }
        while ($i < $word1Len) {
            $result .= $word1[$i];
            ++$i;
        }
        while ($j < $word2Len) {
            $result .= $word2[$j];
            ++$j;
        }

        return $result;
    }
}