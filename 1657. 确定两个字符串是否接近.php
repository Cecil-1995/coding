<?php

class Solution
{

    /**
     * @param String $word1
     * @param String $word2
     * @return Boolean
     */
    function closeStrings($word1, $word2)
    {
        $map1 = [];
        $map2 = [];
        for ($i = 0, $n = strlen($word1); $i < $n; ++$i) {
            $map1[$word1[$i]] = isset($map1[$word1[$i]]) ? ++$map1[$word1[$i]] : 1;
        }
        for ($i = 0, $n = strlen($word2); $i < $n; ++$i) {
            $map2[$word2[$i]] = isset($map2[$word2[$i]]) ? ++$map2[$word2[$i]] : 1;
        }
        if (count($map1) !== count($map2)) {
            return false;
        }

        foreach ($map1 as $i => $item) {
            if (!isset($map2[$i])) {
                return false;
            }
        }

        sort($map1);
        sort($map2);

        foreach ($map1 as $i => $item) {
            if ($item !== $map2[$i]) {
                return false;
            }
        }

        return true;
    }
}