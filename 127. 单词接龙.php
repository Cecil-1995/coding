<?php

class Solution
{

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList)
    {
        $list = [$beginWord => 1];

        while (!empty($list)) {
            $items = $list;
            $list  = [];
            foreach ($items as $word => $val) {
                if ($word === $endWord) {
                    return $val;
                }
                foreach ($wordList as $i => $v) {
                    if ($this->check($v, $word)) {
                        $list[$v] = $val + 1;
                        unset($wordList[$i]);
                    }
                }
            }
        }

        return 0;
    }

    function check($word1, $word2)
    {
        $s1 = strlen($word1);
        $s2 = strlen($word2);
        if ($s1 !== $s2) {
            return false;
        }

        $count = 0;
        for ($i = 0; $i < $s1; ++$i) {
            if ($word1[$i] === $word2[$i]) {
                continue;
            } else {
                ++$count;
            }
        }

        return $count === 1;
    }
}