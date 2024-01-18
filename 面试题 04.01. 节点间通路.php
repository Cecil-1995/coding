<?php

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $graph
     * @param Integer $start
     * @param Integer $target
     * @return Boolean
     */
    function findWhetherExistsPath($n, $graph, $start, $target)
    {
        $map = [];
        foreach ($graph as $item) {
            $map[$item[0]][] = $item[1];
        }

        $visited[$start] = true;
        $list            = $map[$start];
        while ($list) {
            $count = count($list);
            for ($i = 0; $i < $count; ++$i) {
                $curr = array_shift($list);
                if (!isset($visited[$curr]) && isset($map[$curr])) {
                    $list = array_merge($list, $map[$curr]);
                }
                if ($curr === $target) {
                    return true;
                }
            }
        }

        return false;
    }
}