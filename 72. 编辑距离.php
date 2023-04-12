<?php

class Solution
{

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance($word1, $word2)
    {
        $word1Len = strlen($word1);
        $word2Len = strlen($word2);

        /**
         * $dp[$i][$j] word1
         */
        for ($i = 0; $i <= $word1Len; ++$i) {
            $dp[$i][0] = $i;
        }
        for ($j = 0; $j <= $word2Len; ++$j) {
            $dp[0][$j] = $j;
        }

        for ($i = 1; $i <= $word1Len; ++$i) {
            for ($j = 1; $j <= $word2Len; ++$j) {
                if ($word1[$i - 1] === $word2[$j - 1]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1];
                } else {
                    $dp[$i][$j] = min($dp[$i - 1][$j], $dp[$i][$j - 1], $dp[$i - 1][$j - 1]) + 1;
                }
            }
        }

        return $dp[$word1Len][$word2Len];
    }
}