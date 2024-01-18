<?php

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function getMaxMatrix($matrix)
    {
        $row = count($matrix);
        if ($row === 0) {
            return [];
        }
        $col = count($matrix[0]);
        if ($col === 0) {
            return [];
        }

        $pre = [];
        for ($i = 0; $i < $row; ++$i) {
            $pre[$i][0] = 0;
        }
        for ($j = 0; $j < $col; ++$j) {
            $pre[0][$j] = 0;
        }
        for ($i = 1; $i <= $row; ++$i) {
            for ($j = 1; $j <= $col; ++$j) {
                $pre[$i][$j] = $pre[$i - 1][$j] + $pre[$i][$j - 1] - $pre[$i - 1][$j - 1] + $matrix[$i-1][$j-1];
            }
        }

        $ans = [];
        $max = PHP_INT_MIN;
        for ($i = 1; $i <= $row; ++$i) {
            for ($ii = $i; $ii <= $row; ++$ii) {
                $j = 1;
                for ($jj = 1; $jj <= $col; ++$jj) {
                    $localMax = $pre[$ii][$jj] - $pre[$ii][$j - 1] - $pre[$i - 1][$jj] + $pre[$i - 1][$j - 1];
                    if ($max < $localMax) {
                        $max = $localMax;
                        $ans = [$i - 1, $j - 1, $ii - 1, $jj - 1];
                    }
                    if ($localMax < 0) {
                        $j = $jj + 1;
                    }
                }
            }
        }

        return $ans;
    }
}

var_dump((new Solution())->getMaxMatrix([[-1, 0], [0, -1]]));