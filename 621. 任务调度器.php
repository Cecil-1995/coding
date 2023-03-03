<?php

class Solution
{

    /**
     * @param String[] $tasks
     * @param Integer $n
     * @return Integer
     */
    function leastInterval2($tasks, $n)
    {
        $map = [];
        foreach ($tasks as $task) {
            $map[$task] = isset($map[$task]) ? $map[$task] + 1 : 1;
        }

        $count = 0;
        while (!empty($map)) {
            $currentCount = 0;
            arsort($map);
            foreach ($map as $k => $v) {
                var_dump($k);
                ++$currentCount;
                ++$count;
                --$v;
                if ($v === 0) {
                    unset($map[$k]);
                } else {
                    $map[$k] = $v;
                }

                if ($currentCount - 1 >= $n) {
                    break;
                }
            }
            if ($currentCount - 1 < $n && !empty($map)) {
                $count += $n - $currentCount + 1;
                var_dump($n - $currentCount + 1);
            }
        }

        return $count;
    }

    function leastInterval($tasks, $n)
    {
        $map = [];
        foreach ($tasks as $task) {
            $map[$task] = isset($map[$task]) ? $map[$task] + 1 : 1;
        }
        arsort($map);
        $max = current($map);

        $minLen = ($max - 1) * ($n + 1);
        foreach ($map as $k => $v) {
            if ($v === $max) {
                ++$minLen;
            }
        }

        return max($minLen, count($tasks));
    }
}

var_dump((new Solution())->leastInterval(["A", "A", "A", "B", "B", "B", "C", "C", "C", "D", "D", "E"], 2));