<?php

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
        $map = [];
        $path[$k] = 0;

        $timesMap = [];
        foreach ($times as $time) {
            $timesMap[$time[0]][] = $time;
        }

        $list = $timesMap[$k] ?? [];
        while ($list) {
            $time = array_shift($list);
            if (isset($path[$time[1]])) {
                $path[$time[1]] = min($path[$time[0]] + $time[2], $path[$time[1]]);
            } else {
                $path[$time[1]] = $path[$time[0]] + $time[2];
            }

            $list = array_merge($list, $timesMap[$time[1]] ?? []);
            unset($timesMap[$time[1]]);
        }

        if (count($path) !== $n) {
            return -1;
        }
        var_dump($path);

        return max($path);
    }
}

//var_dump((new Solution())->networkDelayTime([[1,2,1],[1,3,18],[2,3,3]], 3,1));
var_dump((new Solution())->networkDelayTime([[4,2,76],[1,3,79],[3,1,81],[4,3,30],[2,1,47],[1,5,61],[1,4,99],[3,4,68],[3,5,46],[4,1,6],[5,4,7],[5,3,44],[4,5,19],[2,3,13],[3,2,18],[1,2,0],[5,1,25],[2,5,58],[2,4,77],[5,2,74]], 5, 3));