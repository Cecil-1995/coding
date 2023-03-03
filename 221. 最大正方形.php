<?php

class Solution
{

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalSquare($matrix)
    {
        $m = count($matrix);
        $n = count($matrix[0]);
        $max = 0;

        for ($i = 0; $i < $m; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                if ($matrix[$i][$j] === '1') {

                    $matrix[$i][$j] = '0';
                    $result         = 1;

                    while (true) {
                        $flag = false;
                        if ($i + $result >= $m || $j + $result >= $n) {
                            break;
                        }
                        for ($jj = $j; $jj < $j + $result && $jj < $n; ++$jj) {
                            if ($matrix[$i + $result][$jj] === '1') {
                                $matrix[$i + $result][$jj] = '0';
                            } else {
                                $flag = true;
                                break;
                            }
                        }
                        for ($ii = $i; $ii <= $i + $result && $ii < $m; ++$ii) {
                            if ($matrix[$ii][$j + $result] === '1') {
                                $matrix[$ii][$j + $result] = '0';
                            } else {
                                $flag = true;
                                break;
                            }
                        }
                        if ($flag) {
                            break;
                        }
                        ++$result;
                    }

                    $max = max($max, $result * $result);
                }
            }
        }

        return $max;
    }

}

var_dump(
    (new Solution())->maximalSquare(
        [["0", "0", "0", "1"], ["1", "1", "0", "1"], ["1", "1", "1", "1"], ["0", "1", "1", "1"], ["0", "1", "1", "1"]]
    )
);