<?php

class Solution
{

    /**
     * @param String[] $dictionary
     * @param String $sentence
     * @return String
     */
    function replaceWords($dictionary, $sentence)
    {
        $map = [];

        foreach ($dictionary as $item) {
            $this->addWord($item, $map);
        }

        $ans      = [];
        $sentence = explode(' ', $sentence);
        foreach ($sentence as $item) {
            if (isset($map[$item[0]])) {
                $ans[] = $this->searchWord($item, $map);
            } else {
                $ans[] = $item;
            }
        }

        return implode(' ', $ans);
    }

    function addWord($word, &$map)
    {
        if (empty($word)) {
            $map['.'] = [];

            return null;
        }

        if (!isset($map[$word[0]])) {
            $map[$word[0]] = [];
        }

        return $this->addWord(substr($word, 1), $map[$word[0]]);
    }

    function searchWord($word, $map)
    {
        if (empty($word) || isset($map['.'])) {
            return '';
        }

        if (isset($map[$word[0]])) {
            return $word[0] . $this->searchWord(substr($word, 1), $map[$word[0]]);
        } else {
            return $word;
        }
    }
}