<?php

class NumMatrix
{
    public $dp = [];

    /**
     * @param Integer[][] $matrix
     */
    function __construct($matrix)
    {
        $m = count($matrix);
        $n = count($matrix[0]);

        $this->dp[0][0] = $matrix[0][0];
        for ($i = 1; $i < $m; ++$i) {
            $this->dp[$i][0] = $this->dp[$i - 1][0] + $matrix[$i][0];
        }
        for ($j = 1; $j < $n; ++$j) {
            $this->dp[0][$j] = $this->dp[0][$j - 1] + $matrix[0][$j];
        }

        for ($i = 1; $i < $m; ++$i) {
            for ($j = 1; $j < $n; ++$j) {
                $this->dp[$i][$j] = $this->dp[$i - 1][$j] + $this->dp[$i][$j - 1] - $this->dp[$i - 1][$j - 1] + $matrix[$i][$j];
            }
        }
    }

    /**
     * @param Integer $row1
     * @param Integer $col1
     * @param Integer $row2
     * @param Integer $col2
     * @return Integer
     */
    function sumRegion($row1, $col1, $row2, $col2)
    {
        return $this->dp[$row2][$col2] - ($row1 - 1 < 0 ? 0 : $this->dp[$row1 - 1][$col2]) - ($col1 - 1 < 0 ? 0 : $this->dp[$row2][$col1 - 1]) + ($row1 - 1 < 0 || $col1 - 1 < 0 ? 0 : $this->dp[$row1 - 1][$col1 - 1]);
    }
}

$obj = new NumMatrix([[3, 0, 1, 4, 2], [5, 6, 3, 2, 1], [1, 2, 0, 1, 5], [4, 1, 0, 1, 7], [1, 0, 3, 0, 5]]);
var_dump($obj->sumRegion(2, 1, 4, 3));

/**
 * Your NumMatrix object will be instantiated and called as such:
 * $obj = NumMatrix($matrix);
 * $ret_1 = $obj->sumRegion($row1, $col1, $row2, $col2);
 */