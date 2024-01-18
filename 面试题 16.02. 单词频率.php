<?php

class WordsFrequency
{
    public $map;

    /**
     * @param String[] $book
     */
    function __construct($book)
    {
        foreach ($book as $item) {
            $this->map[$item] = isset($this->map[$item]) ? $this->map[$item] + 1 : 1;
        }
    }

    /**
     * @param String $word
     * @return Integer
     */
    function get($word)
    {
        return $this->map[$word] ?? 0;
    }
}

/**
 * Your WordsFrequency object will be instantiated and called as such:
 * $obj = WordsFrequency($book);
 * $ret_1 = $obj->get($word);
 */