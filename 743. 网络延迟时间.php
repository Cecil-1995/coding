<?php

class MinSplPriorityQueue extends SplPriorityQueue
{
    function compare($priority1, $priority2)
    {
        return $priority2 - $priority1;
    }
}

class State
{
    public $id;
    public $distFromStart;

    function __construct($id, $distFromStart)
    {
        $this->id            = $id;
        $this->distFromStart = $distFromStart;
    }
}

class Solution
{

    /**
     * @param Integer[][] $times
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function networkDelayTime($times, $n, $k)
    {
        $graph  = [];
        $distTo = [];
        for ($i = 1; $i <= $n; ++$i) {
            $graph[$i]  = [];
            $distTo[$i] = PHP_INT_MAX;
        }

        foreach ($times as $time) {
            $from   = $time[0];
            $to     = $time[1];
            $weight = $time[2];

            $graph[$from][] = [$to, $weight];
        }

        $this->dijkstra($graph, $k, $distTo);

        $ans = max($distTo);

        return $ans === PHP_INT_MAX ? -1 : $ans;
    }

    function dijkstra($graph, $start, &$distTo)
    {
        $distTo[$start] = 0;

        $pq = new MinSplPriorityQueue();
        $pq->insert(new State($start, 0), 0);

        while (!$pq->isEmpty()) {
            $item          = $pq->extract();
            $id            = $item->id;
            $distFromStart = $item->distFromStart;

            if ($distFromStart > $distTo[$id]) {
                continue;
            }

            foreach ($graph[$id] as $value) {
                $nextId            = $value[0];
                $nextDistFromStart = $distFromStart + $value[1];

                if ($distTo[$nextId] > $nextDistFromStart) {
                    $distTo[$nextId] = $nextDistFromStart;
                    $pq->insert(new State($nextId, $nextDistFromStart), $nextDistFromStart);
                }
            }
        }
    }
}

//var_dump((new Solution())->networkDelayTime([[1,2,1],[1,3,18],[2,3,3]], 3,1));
var_dump(
    (new Solution())->networkDelayTime(
        [
            [4, 2, 76],
            [1, 3, 79],
            [3, 1, 81],
            [4, 3, 30],
            [2, 1, 47],
            [1, 5, 61],
            [1, 4, 99],
            [3, 4, 68],
            [3, 5, 46],
            [4, 1, 6],
            [5, 4, 7],
            [5, 3, 44],
            [4, 5, 19],
            [2, 3, 13],
            [3, 2, 18],
            [1, 2, 0],
            [5, 1, 25],
            [2, 5, 58],
            [2, 4, 77],
            [5, 2, 74]
        ], 5, 3
    )
);