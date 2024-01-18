<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix)
    {
        $row = count($matrix);
        if ($row === 0) {
            return null;
        }
        $col = count($matrix[0]);
        if ($col === 0) {
            return null;
        }

        $rowMap = [];
        $colMap = [];
        for ($i = 0; $i < $row; ++$i) {
            for ($j = 0; $j < $col; ++$j) {
                if ($matrix[$i][$j] === 0) {
                    $rowMap[$i] = true;
                    $colMap[$j] = true;
                    for ($k = 0; $k < $j; ++$k) {
                        $matrix[$i][$k] = 0;
                    }
                    for ($k = 0; $k < $i; ++$k) {
                        $matrix[$k][$j] = 0;
                    }
                } elseif (isset($rowMap[$i]) || isset($colMap[$j])) {
                    $matrix[$i][$j] = 0;
                }
            }
        }

        return null;
    }
}