<?php

class Solution
{

    /**
     * @param String[] $dictionary
     * @param String $sentence
     * @return Integer
     */
    function respace($dictionary, $sentence)
    {
        $map = [];
        foreach ($dictionary as $item) {
            $map[$item] = true;
        }

        $n = strlen($sentence);
        if ($n === 0) {
            return 0;
        }
        $dp[0] = 0;
        for ($i = 1; $i <= $n; ++$i) {
            $dp[$i] = $dp[$i - 1] + 1;
            for ($j = 0; $j < $i; ++$j) {
                if (isset($map[substr($sentence, $j, $i - $j)])) {
                    $dp[$i] = min($dp[$i], $dp[$j]);
                }
            }
        }

        return $dp[$n];
    }
}

var_dump((new Solution())->respace(["looked", "just", "like", "her", "brother"], 'jesslookedjustliketimherbrother'));