<?php

class Trie
{
    private $isEnd;
    private $next;

    /**
     */
    function __construct()
    {
        $this->isEnd = false;
        $this->next  = [];
    }

    /**
     * @param String $word
     * @return NULL
     */
    function insert($word)
    {
        $node = $this;
        for ($i = 0, $len = strlen($word); $i < $len; ++$i) {
            if (empty($node->next[$word[$i]])) {
                $node->next[$word[$i]] = new Trie();
            }
            $node = $node->next[$word[$i]];
        }
        $node->isEnd = true;

        return null;
    }

    /**
     * @param String $word
     * @return Boolean
     */
    function search($word)
    {
        $node = $this;
        for ($i = 0, $len = strlen($word); $i < $len; ++$i) {
            if (empty($node->next[$word[$i]])) {
                return false;
            }
            $node = $node->next[$word[$i]];
        }

        return $node->isEnd;
    }

    /**
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix)
    {
        $node = $this;
        for ($i = 0, $len = strlen($prefix); $i < $len; ++$i) {
            if (empty($node->next[$prefix[$i]])) {
                return false;
            }
            $node = $node->next[$prefix[$i]];
        }

        return true;
    }
}

/**
 * Your Trie object will be instantiated and called as such:
 * $obj = Trie();
 * $obj->insert($word);
 * $ret_2 = $obj->search($word);
 * $ret_3 = $obj->startsWith($prefix);
 */