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
        $ans = 0;
        $que = [0];

        $map     = [];
        $visited = [];
        foreach ($connections as $i => $connection) {
            $map[$connection[0]][] = $i;
            $map[$connection[1]][] = $i;
        }

        while (!empty($que)) {
            $item = array_shift($que);
            foreach ($map[$item] as $i) {
                if (isset($visited[$i])) {
                    continue;
                }
                $visited[$i] = true;
                $connection  = $connections[$i];

                $ans   += $connection[0] == $item;
                $que[] = $connection[0] == $item ? $connection[1] : $connection[0];
            }
        }

        return $ans;
    }
}