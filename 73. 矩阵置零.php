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
        $col = count($matrix[0]);

        $rowFlag = false;
        $colFLag = false;
        for ($i = 0; $i < $row; ++$i) {
            if ($matrix[$i][0] === 0) {
                $colFLag = true;
                break;
            }
        }
        for ($j = 0; $j < $col; ++$j) {
            if ($matrix[0][$j] === 0) {
                $rowFlag = true;
                break;
            }
        }

        for ($i = 1; $i < $row; ++$i) {
            for ($j = 1; $j < $col; ++$j) {
                if ($matrix[$i][$j] === 0) {
                    $matrix[$i][0] = 0;
                    $matrix[0][$j] = 0;
                }
            }
        }
        for ($i = 1; $i < $row; ++$i) {
            for ($j = 1; $j < $col; ++$j) {
                if ($matrix[$i][0] === 0 || $matrix[0][$j] === 0) {
                    $matrix[$i][$j] = 0;
                }
            }
        }

        if ($rowFlag) {
            for ($j = 0; $j < $col; ++$j) {
                $matrix[0][$j] = 0;
            }
        }
        if ($colFLag) {
            for ($i = 0; $i < $row; ++$i) {
                $matrix[$i][0] = 0;
            }
        }

        return null;
    }
}