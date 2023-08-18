<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k)
    {
        $map = [];
        foreach ($nums as $num) {
            $map[$num] = isset($map[$num]) ? $map[$num] + 1 : 1;
        }

        arsort($map);

        $ans = [];
        foreach ($map as $i => $item) {
            $ans[] = $i;
            if (--$k === 0) {
                break;
            }
        }

        return $ans;
    }


    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent2($nums, $k)
    {
        $map = [];
        foreach ($nums as $num) {
            $map[$num] = isset($map[$num]) ? $map[$num] + 1 : 1;
        }

        $queue = new SplPriorityQueue();
//        $queue->setExtractFlags(SplPriorityQueue::EXTR_DATA);
        foreach ($map as $i => $v) {
            $queue->insert($i, $v);
        }

        $ans = [];
        while ($k--) {
            $ans[] = $queue->extract();
        }

        return $ans;
    }
}

(new Solution())->topKFrequent([-1, -1], 1);