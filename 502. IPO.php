<?php

class Solution
{

    /**
     * @param Integer $k
     * @param Integer $w
     * @param Integer[] $profits
     * @param Integer[] $capital
     * @return Integer
     */
    function findMaximizedCapital($k, $w, $profits, $capital)
    {
        $map = [];
        foreach ($profits as $i => $profit) {
            $map[] = ['p' => $profit, 'c' => $capital[$i]];
        }
        array_multisort(array_column($map, 'c'), SORT_ASC, $map);

        $queue = new SplPriorityQueue();

        $i = 0;
        while ($k--) {
            while (isset($map[$i]) && $map[$i]['c'] <= $w) {
                $queue->insert($map[$i]['p'], $map[$i]['p']);
                ++$i;
            }
            if ($queue->isEmpty()) {
                break;
            } else {
                $w += $queue->extract();
            }
        }

        return $w;
    }
}