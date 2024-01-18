<?php

class MinSplPriorityQueue extends SplPriorityQueue
{
    function compare($priority1, $priority2)
    {
        return $priority2 - $priority1;
    }
}

class Solution
{

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function smallestK($arr, $k)
    {
        $n = count($arr);
        if ($n === $k) {
            return $arr;
        }

        $ans  = [];
        $list = new MinSplPriorityQueue();
        foreach ($arr as $num) {
            if ($list->count() === $n - $k) {
                if ($list->top() >= $num) {
                    $ans[] = $num;
                } else {
                    $ans[] = $list->extract();
                    $list->insert($num, $num);
                }
            } else {
                $list->insert($num, $num);
            }
        }

        return $ans;
    }
}