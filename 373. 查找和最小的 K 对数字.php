<?php

class MinSplPriorityQueue extends splPriorityQueue
{
    function compare($priority1, $priority2)
    {
        return $priority2 - $priority1;
    }

}

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer[][]
     */
    function kSmallestPairs($nums1, $nums2, $k)
    {
        $queue = new SPLPriorityQueue();
        $queue->setExtractFlags(SPLPriorityQueue::EXTR_PRIORITY);

        for ($i = 0, $m = count($nums1); $i < $m; ++$i) {
            for ($j = 0, $n = count($nums2); $j < $n; ++$j) {
                if ($queue->count() < $k) {
                    $queue->insert([$nums1[$i], $nums2[$j]], $nums1[$i] + $nums2[$j]);
                } else {
                    if ($nums1[$i] + $nums2[$j] > $queue->top()) {
                        break;
                    } else {
                        $queue->extract();
                        $queue->insert([$nums1[$i], $nums2[$j]], $nums1[$i] + $nums2[$j]);
                    }
                }
            }
        }

        $ans = [];
        $queue->setExtractFlags(SPLPriorityQueue::EXTR_DATA);
        while (!$queue->isEmpty()) {
            $ans[] = $queue->extract();
        }

        return $ans;
    }

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer[][]
     */
    function kSmallestPairs2($nums1, $nums2, $k)
    {
        $m = count($nums1);
        $n = count($nums2);

        $queue = new MinSplPriorityQueue();

        for ($i = 0; $i < min($m, $k); ++$i) {
            $queue->insert([$i, 0], $nums1[$i] + $nums2[0]);
        }

        $ans = [];
        while ($k-- && !$queue->isEmpty()) {
            $item  = $queue->extract();
            $ans[] = [$nums1[$item[0]], $nums2[$item[1]]];

            if (++$item[1] < $n) {
                $queue->insert($item, $nums1[$item[0]] + $nums2[$item[1]]);
            }
        }

        return $ans;
    }
}