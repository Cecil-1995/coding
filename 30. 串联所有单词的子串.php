<?php

class Solution
{

    public $map = [];

    /**
     * @param String $s
     * @param String[] $words
     * @return Integer[]
     */
    function findSubstring($s, $words)
    {
        foreach ($words as $word) {
            $this->map[$word] = isset($this->map[$word]) ? $this->map[$word] + 1 : 1;
        }
        $ans       = [];
        $window    = '';
        $windowLen = count($words) * strlen($words[0]);
        for ($i = 0, $len = strlen($s); $i < $len; ++$i) {
            $window .= $s[$i];
            if (strlen($window) === $windowLen) {
                if ($this->check($window, strlen($words[0]))) {
                    $ans[] = $i + 1 - $windowLen;
                }
                $window = substr($window, 1);
            }
        }

        return $ans;
    }

    function check($s, $wordLen)
    {
        $map = $this->map;
        for ($i = 0; $i < strlen($s); $i += $wordLen) {
            if (isset($map[substr($s, $i, $wordLen)])) {
                --$map[substr($s, $i, $wordLen)];
                if ($map[substr($s, $i, $wordLen)] === 0) {
                    unset($map[substr($s, $i, $wordLen)]);
                }
            } else {
                return false;
            }
        }

        return true;
    }
}