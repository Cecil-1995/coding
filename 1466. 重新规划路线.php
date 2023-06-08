<?php

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $connections
     * @return Integer
     */
    function minReorder($n, $connections)
    {
        $result  = 0;
        $visited = [];
        $this->dfs($result, $connections, $visited, 0);

        return $result;
    }

    function dfs(&$result, &$connections, &$visited, $i)
    {
        foreach ($connections as $k => $item) {
            if ($item[0] === $i && !isset($visited[$k])) {
                ++$result;
                $connections[$k] = [$item[1], $item[0]];
                $visited[$k]     = true;
                $this->dfs($result, $connections, $visited, $item[1]);
            } elseif ($item[1] === $i && !isset($visited[$k])) {
                $visited[$k] = true;
                $this->dfs($result, $connections, $visited, $item[0]);
            }
        }
    }
}