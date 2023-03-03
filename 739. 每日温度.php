<?php

class Solution
{

    /**
     * @param Integer[] $temperatures
     * @return Integer[]
     */
    function dailyTemperatures($temperatures)
    {
        $res   = [];
        $stack = [];

        for ($i = count($temperatures) - 1; $i >= 0; --$i) {
            while (!empty($stack) && $temperatures[$stack[count($stack) - 1]] <= $temperatures[$i]) {
                array_pop($stack);
            }

            $res[$i] = empty($stack) ? 0 : $stack[count($stack) - 1] - $i;
            $stack[] = $i;
        }

        ksort($res);
        return $res;
    }
}

var_dump((new Solution())->dailyTemperatures([73,74,75,71,69,72,76,73]));