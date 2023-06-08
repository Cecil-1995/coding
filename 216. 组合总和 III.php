<?php

class Solution
{

    /**
     * @param Integer $k
     * @param Integer $n
     * @return Integer[][]
     */
    function combinationSum3($k, $n)
    {
        $result = [];

        $this->backtrack($result, [], $k, $n, 1);

        return $result;
    }

    function backtrack(&$result, $current, $k, $n, $start)
    {
        if ($n === 0 && $k === 0) {
            $result[] = $current;
        } elseif ($n < 0 || $k < 0) {
            return;
        }

        for ($i = $start; $i <= 9; ++$i) {
            // 选择
            $current[] = $i;
            $this->backtrack($result, $current, $k - 1, $n - $i, $i + 1);

            // 撤销选择
            array_pop($current);
        }
    }
}