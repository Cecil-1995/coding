<?php

class MagicDictionary
{
    public $tr;
    public $index;
    public $end;

    /**
     */
    function __construct()
    {
        $this->tr    = [];
        $this->index = 0;
        $this->end   = [];
    }

    /**
     * @param String[] $dictionary
     * @return NULL
     */
    function buildDict($dictionary)
    {
        foreach ($dictionary as $item) {
            $p   = 0;
            $len = strlen($item);
            for ($i = 0; $i < $len; ++$i) {
                if (!isset($this->tr[$p][$item[$i]])) {
                    $this->tr[$p][$item[$i]] = ++$this->index;
                }
                $p = $this->tr[$p][$item[$i]];
            }
            $this->end[$p] = true;
        }

        return null;
    }

    /**
     * @param String $searchWord
     * @return Boolean
     */
    function search($searchWord)
    {
        return $this->s($searchWord, 0, 0, 1);
    }

    function s($searchWord, $idx, $p, $limit)
    {
        if ($limit < 0) {
            return false;
        }
        if ($idx === strlen($searchWord) && $limit === 0 && isset($this->end[$p])) {
            return true;
        }

        for ($i = 0; $i < 26; ++$i) {
            if (!isset($this->tr[$p][chr(ord('a') + $i)])) {
                continue;
            } elseif ($this->s(
                $searchWord, $idx + 1, $this->tr[$p][chr(ord('a') + $i)],
                chr(ord('a') + $i) === $searchWord[$idx] ? $limit : $limit - 1
            )) {
                return true;
            }
        }

        return false;
    }
}

/**
 * Your MagicDictionary object will be instantiated and called as such:
 * $obj = MagicDictionary();
 * $obj->buildDict($dictionary);
 * $ret_2 = $obj->search($searchWord);
 */