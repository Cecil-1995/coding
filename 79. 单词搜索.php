<?php

class Solution
{
    public $word;

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word)
    {
        $this->word = $word;

        return $this->backtrack($board, $word, '', 0, 0);
    }

    function backtrack($board, $word, $current, $i, $j)
    {
        if ($current === $this->word) {
            return true;
        }

        if ($current === '') {
            for ($ii = $i; $ii < count($board); ++$ii) {
                for ($jj = $j; $jj < count($board[0]); ++$jj) {
                    if ($board[$ii][$jj] === $word[0]) {
                        $board[$ii][$jj] = true;
                        if ($this->backtrack($board, substr($word, 1), $current . $word[0], $ii, $jj)) {
                            return true;
                        }
                        $board[$ii][$jj] = $word[0];
                    }
                }
            }
        } else {
            // 只能找当前位置的水平和垂直相邻的坐标
            if (isset($board[$i + 1][$j]) && $board[$i + 1][$j] === $word[0]) {
                $board[$i + 1][$j] = true;
                if ($this->backtrack($board, substr($word, 1), $current . $word[0], $i + 1, $j)) {
                    return true;
                }
                $board[$i + 1][$j] = $word[0];
            }
            if (isset($board[$i - 1][$j]) && $board[$i - 1][$j] === $word[0]) {
                $board[$i - 1][$j] = true;
                if ($this->backtrack($board, substr($word, 1), $current . $word[0], $i - 1, $j)) {
                    return true;
                }
                $board[$i - 1][$j] = $word[0];
            }
            if (isset($board[$i][$j + 1]) && $board[$i][$j + 1] === $word[0]) {
                $board[$i][$j + 1] = true;
                if ($this->backtrack($board, substr($word, 1), $current . $word[0], $i, $j + 1)) {
                    return true;
                }
                $board[$i][$j + 1] = $word[0];
            }
            if (isset($board[$i][$j - 1]) && $board[$i][$j - 1] === $word[0]) {
                $board[$i][$j - 1] = true;
                if ($this->backtrack($board, substr($word, 1), $current . $word[0], $i, $j - 1)) {
                    return true;
                }
                $board[$i][$j - 1] = $word[0];
            }
        }

        return false;
    }
}