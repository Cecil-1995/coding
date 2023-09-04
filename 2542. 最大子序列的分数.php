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
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @param Integer $k
     * @return Integer
     */
    function maxScore($nums1, $nums2, $k)
    {
        arsort($nums2);
        $pq = new MinSplPriorityQueue();

        $ans = 0;
        $sum = 0;
        foreach ($nums2 as $i => $v) {
            $flag = false;
            if ($pq->count() < $k) {
                $pq->insert($nums1[$i], $nums1[$i]);
                $sum  += $nums1[$i];
                $flag = true;
            }

            if ($pq->count() === $k) {
                if ($pq->top() < $nums1[$i] && !$flag) {
                    $sum -= $pq->extract();
                    $pq->insert($nums1[$i], $nums1[$i]);
                    $sum += $nums1[$i];
                }

                $ans = max($ans, $sum * $v);
            }
        }

        return $ans;
    }
}