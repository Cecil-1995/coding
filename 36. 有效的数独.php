<?php

class Solution
{

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board)
    {
        for ($i = 0; $i < 9; ++$i) {
            for ($j = 0; $j < 9; ++$j) {
                if ($board[$i][$j] === '.') {
                    continue;
                } else {
                    // 取出当前行
                    $items = [];
                    for ($k = 0; $k < 9; ++$k) {
                        if ($board[$i][$k] !== '.') {
                            $items[] = $board[$i][$k];
                        }
                    }
                    if (count($items) !== count(array_unique($items))) {
                        return false;
                    }

                    // 取出当前行
                    $items = [];
                    for ($k = 0; $k < 9; ++$k) {
                        if ($board[$k][$j] !== '.') {
                            $items[] = $board[$k][$j];
                        }
                    }
                    if (count($items) !== count(array_unique($items))) {
                        return false;
                    }

                    // 当前9个格
                    $items = [];
                    if (0 <= $i && $i <= 2) {
                        $ii = 1;
                    } elseif (3 <= $i && $i <= 5) {
                        $ii = 4;
                    } else {
                        $ii = 7;
                    }
                    if (0 <= $j && $j <= 2) {
                        $jj = 1;
                    } elseif (3 <= $j && $j <= 5) {
                        $jj = 4;
                    } else {
                        $jj = 7;
                    }
                    for ($iii = $ii - 1; $iii <= $ii + 1; ++$iii) {
                        for ($jjj = $jj - 1; $jjj <= $jj + 1; ++$jjj) {
                            if ($board[$iii][$jjj] !== '.') {
                                $items[] = $board[$iii][$jjj];
                            }
                        }
                    }
                    var_dump($items);
                    if (count($items) !== count(array_unique($items))) {
                        return false;
                    }
                }
            }
        }

        return true;
    }
}

var_dump(
    (new Solution())->isValidSudoku(
        [
            [".", ".", ".", ".", ".", ".", "5", ".", "."],
            [".", ".", ".", ".", ".", ".", ".", ".", "."],
            [".", ".", ".", ".", ".", ".", ".", ".", "."],
            ["9", "3", ".", ".", "2", ".", "4", ".", "."],
            [".", ".", "7", ".", ".", ".", "3", ".", "."],
            [".", ".", ".", ".", ".", ".", ".", ".", "."],
            [".", ".", ".", "3", "4", ".", ".", ".", "."],
            [".", ".", ".", ".", ".", "3", ".", ".", "."],
            [".", ".", ".", ".", ".", "5", "2", ".", "."]
        ]
    )
);