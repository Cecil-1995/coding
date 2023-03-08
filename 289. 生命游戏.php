<?php

class Solution
{

    /**
     * @param Integer[][] $board
     * @return NULL
     */
    function gameOfLife(&$board)
    {
        $row = count($board);
        $col = count($board[0]);

        for ($i = 0; $i < $row; ++$i) {
            for ($j = 0; $j < $col; ++$j) {

                $live = 0;
                for ($ii = $i - 1; $ii <= $i + 1; ++$ii) {
                    for ($jj = $j - 1; $jj <= $j + 1; ++$jj) {
                        if ($ii === $i && $jj === $j) {
                            continue;
                        }
                        if (isset($board[$ii][$jj]) && ($board[$ii][$jj] === 1 || $board[$ii][$jj] === -1)) {
                            ++$live;
                        }
                    }
                }

                if (($live < 2 || $live > 3) && $board[$i][$j] === 1) {
                    $board[$i][$j] = -1;
                } elseif ($live === 3 && $board[$i][$j] === 0) {
                    $board[$i][$j] = 2;
                }
            }
        }

        for ($i = 0; $i < $row; ++$i) {
            for ($j = 0; $j < $col; ++$j) {
                if ($board[$i][$j] === -1) {
                    $board[$i][$j] = 0;
                } elseif ($board[$i][$j] === 2) {
                    $board[$i][$j] = 1;
                }

            }
        }

        return null;
    }
}