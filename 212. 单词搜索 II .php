<?php

class Solution
{

    /**
     * @param String[][] $board
     * @param String[] $words
     * @return String[]
     */
    function findWords($board, $words)
    {
        $ans = [];

        $map = [];
        $ij  = [];
        foreach ($board as $i => $ii) {
            foreach ($ii as $j => $jj) {
                $this->searchWord2($board, $i, $j, '', $map, $ij);
            }
        }

        foreach ($words as $word) {
            if (isset($map[$word])) {
                $ans[] = $word;
            }
        }

        return $ans;
    }

    function searchWord2($board, $i, $j, $word, &$map, &$ij)
    {
        if ($i < 0 || $j < 0 || $i > count($board) - 1 || $j > count($board[0]) - 1) {
            return;
        }
        if ($board[$i][$j] === '') {
            return;
        }

        $word       .= $board[$i][$j];
        $map[$word] = true;

        $board[$i][$j] = '';
        if (isset($ij[$i][$j]['top'])) {

        } else {
            $this->searchWord2($board, $i - 1, $j, $word, $map, $ij);
        }
        if (isset($ij[$i][$j]['bottom'])) {

        } else {
            $this->searchWord2($board, $i + 1, $j, $word, $map);
        }
        if (isset($ij[$i][$j]['left'])) {

        } else {
            $this->searchWord2($board, $i, $j - 1, $word, $map);
        }
        if (isset($ij[$i][$j]['right'])) {

        } else {
            $this->searchWord2($board, $i, $j + 1, $word, $map);
        }
    }

    function searchWord($board, $word, $i, $j)
    {
        if ($word === '') {
            return true;
        }
        $char = substr($word, 0, 1);

        if ($i < 0 || $j < 0 || $i > count($board) - 1 || $j > count($board[0]) - 1) {
            return false;
        }
        if ($board[$i][$j] === '' || $board[$i][$j] !== $char) {
            return false;
        }
        $board[$i][$j] = '';

        // 上，下，左，右
        if ($this->searchWord($board, substr($word, 1), $i - 1, $j)) {
            return true;
        }
        if ($this->searchWord($board, substr($word, 1), $i + 1, $j)) {
            return true;
        }
        if ($this->searchWord($board, substr($word, 1), $i, $j - 1)) {
            return true;
        }
        if ($this->searchWord($board, substr($word, 1), $i, $j + 1)) {
            return true;
        }

        return false;
    }
}