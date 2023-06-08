<?php

class Solution
{

    /**
     * @param String $text1
     * @param String $text2
     * @return Integer
     */
    function longestCommonSubsequence($text1, $text2)
    {
        $len1 = strlen($text1);
        $len2 = strlen($text2);

        $dp[0][0] = $text1[0] === $text2[0] ? 1 : 0;
        for ($i = 1; $i < $len1; ++$i) {
            $dp[$i][0] = $text1[$i] === $text2[0] ? 1 : $dp[$i - 1][0];
        }
        for ($j = 1; $j < $len2; ++$j) {
            $dp[0][$j] = $text1[0] === $text2[$j] ? 1 : $dp[0][$j - 1];
        }

        for ($i = 1; $i < $len1; ++$i) {
            for ($j = 1; $j < $len2; ++$j) {
                if ($text1[$i] === $text2[$j]) {
                    $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
                } else {
                    $dp[$i][$j] = max($dp[$i][$j - 1], $dp[$i - 1][$j], $dp[$i - 1][$j - 1]);
                }
            }
        }

        return $dp[$len1 - 1][$len2 - 1];
    }
}