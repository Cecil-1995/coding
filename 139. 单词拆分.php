<?php

class Solution
{
    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict)
    {
        $dp[0] = true;
        for ($i = 0; $i <= strlen($s); ++$i) {
            for ($j = 0; $j < $i; ++$j) {
                if (isset($dp[$j]) && $dp[$j] && in_array(substr($s, $j, $i - $j), $wordDict)) {
                    $dp[$i] = true;
                }
            }
        }

        return $dp[strlen($s)] ?? false;
    }

}

var_dump((new Solution())->wordBreak('leetcode', ["leet", "code"]));