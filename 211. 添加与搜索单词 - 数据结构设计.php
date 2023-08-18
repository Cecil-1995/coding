<?php

class WordDictionary
{
    public $map = [];

    /**
     */
    function __construct()
    {
    }

    /**
     * @param String $word
     * @return NULL
     */
    function addWord($word)
    {
        return $this->addWordMap($word, $this->map);
    }

    function addWordMap($word, &$map)
    {
        if (empty($word)) {
            // 标记结尾
            $map['.'] = [];
            return null;
        }

        $char = $word[0];
        if (!$map[$char]) {
            $map[$char] = [];
        }

        return $this->addWordMap(substr($word, 1), $map[$char]);
    }

    /**
     * @param String $word
     * @return Boolean
     */
    function search($word)
    {
        return $this->searchMap($word, $this->map);
    }

    function searchMap($word, $map)
    {
        if (empty($word) && isset($map['.'])) {
            return true;
        }

        if ($word[0] !== '.') {
            if (!isset($map[$word[0]])) {
                return false;
            } else {
                return $this->searchMap(substr($word, 1), $map[$word[0]]);
            }
        } else {
            foreach ($map as $item) {
                if ($this->searchMap(substr($word, 1), $item)) {
                    return true;
                }
            }

            return false;
        }
    }
}

/**
 * Your WordDictionary object will be instantiated and called as such:
 * $obj = WordDictionary();
 * $obj->addWord($word);
 * $ret_2 = $obj->search($word);
 */