<?php

class Solution
{

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows)
    {
        $ans = '';

        $step = function ($numRows){
            if ($numRows === 1) {
                $step = 1;
            } elseif ($numRows === 2) {
                $step = 2;
            } else {
                $step = $numRows + $numRows - 2;
            }

            return $step;
        };

        for ($i = 0; $i < strlen($s); $i += $step($numRows)) {
            $ans .= $s[$i];
        }

        for ($n = 1; $n < $numRows - 1; ++$n) {
            for ($i = $n; $i < strlen($s); $i += $step($numRows)) {
                $ans .= $s[$i];
                if ($i + $step($numRows - $n) < strlen($s)) {
                    $ans .= $s[$i + $step($numRows - $n)];
                }
            }
        }

        for ($i = $n; $i < strlen($s) && $n < $numRows; $i += $step($numRows)) {
            $ans .= $s[$i];
        }

        return $ans;
    }
}