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

        foreach ($board as $i => $ii) {
            foreach ($ii as $j => $jj) {
                $this->searchWord2($board, $i, $j, '', $map);
            }
        }

        foreach ($words as $word) {
            if (isset($map[$word])) {
                $ans[] = $word;
            }
        }

        return $ans;
    }

    function searchWord2($board, $i, $j, $word, &$map)
    {
        if ($i < 0 || $j < 0 || $i > count($board) - 1 || $j > count($board[0]) - 1) {
            return;
        }
        if ($board[$i][$j] === '') {
            return;
        }

        $word       .= $board[$i][$j];
        $map[$word] = true;
        if (strlen($word) === 10) {
            return;
        }

        $board[$i][$j] = '';
        $this->searchWord2($board, $i - 1, $j, $word, $map);
        $this->searchWord2($board, $i + 1, $j, $word, $map);
        $this->searchWord2($board, $i, $j - 1, $word, $map);
        $this->searchWord2($board, $i, $j + 1, $word, $map);
    }
}