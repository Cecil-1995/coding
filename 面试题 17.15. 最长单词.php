<?php

class Solution
{

    /**
     * @param String[] $words
     * @return String
     */
    function longestWord($words)
    {
        $ans = '';
        $map = [];
        foreach ($words as $word) {
            $map[$word] = true;
        }
        foreach ($words as $word) {
            unset($map[$word]);
            if ($this->check($map, $word, 0)) {
                if (strlen($ans) < strlen($word) || (strlen($ans) === strlen($word) && $this->comp(
                            $ans, $word
                        ) === -1)) {
                    $ans = $word;
                }
            }
            $map[$word] = true;
        }

        return $ans;
    }

    function check($map, $word, $start)
    {
        $len = strlen($word);
        if ($start === $len) {
            return true;
        }
        for ($j = 1; $start + $j <= $len; ++$j) {
            if (isset($map[substr($word, $start, $j)]) && $this->check($map, $word, $start + $j)) {
                return true;
            }
        }

        return false;
    }

    function comp($a, $b)
    {
        $aLen = strlen($a);
        $bLen = strlen($b);
        $i    = 0;
        $j    = 0;
        while ($i < $aLen && $j < $bLen) {
            if ($a[$i] < $b[$j]) {
                return 1;
            } elseif ($a[$i] > $b[$j]) {
                return -1;
            } else {
                ++$i;
                ++$j;
            }
        }
        if ($i < $aLen) {
            return -1;
        }
        if ($j < $bLen) {
            return 1;
        }

        return 0;
    }
}

$words = ["pg", "ptgt", "tgpppttg", "tptttgg", "pgttggtpt", "t", "ptg", "ppgp", "g", "ptgpptpgg"];
var_dump((new Solution())->longestWord($words));