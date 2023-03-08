<?php

class Solution
{

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows)
    {
        if ($numRows === 0) {
            return [];
        }
        $result = [[1]];

        for ($i = 2; $i <= $numRows; ++$i) {
            $items = [];
            for ($j = 0; $j < $i; ++$j) {
                if ($j === 0 || $j === $i - 1) {
                    $items[] = 1;
                } else {
                    $items[] = $result[$i - 2][$j - 1] + $result[$i - 2][$j];
                }
            }
            $result[] = $items;
        }

        return $result;
    }
}

var_dump((new Solution())->generate(5));