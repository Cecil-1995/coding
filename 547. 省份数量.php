<?php

class Solution
{

    /**
     * @param Integer[][] $isConnected
     * @return Integer
     */
    function findCircleNum($isConnected)
    {
        $visited = [];
        $result  = 0;
        foreach ($isConnected as $k => $v) {
            if (!isset($visited[$k])) {
                $this->dfs($visited, $isConnected, $k);

                ++$result;
            }
        }

        return $result;
    }

    function dfs(&$visited, $isConnected, $i)
    {
        foreach ($isConnected[$i] as $j => $item) {
            if (!$visited[$j] && $isConnected[$i][$j] === 1) {
                $visited[$j] = true;
                $this->dfs($visited, $isConnected, $j);
            }
        }
    }
}