<?php

class CustomerSpPriorityQueue extends SplPriorityQueue
{
    //    function compare($priority1, $priority2)
    //    {
    //        return $priority2 - $priority1;
    //    }
}

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k)
    {
        $queue = new SplPriorityQueue();
        $queue->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        $ans = [];

        for ($i = 0; $i < $k - 1 && $i < count($nums); ++$i) {
            $queue->insert($i, $nums[$i]);
        }
        for ($i = $k - 1; $i < count($nums); ++$i) {
            $queue->insert($i, $nums[$i]);

            while (true) {
                $data = $queue->top();
                if ($i - $data['data'] < $k) {
                    $ans[] = $data['priority'];
                    break;
                }
                $queue->extract();
            }
        }

        return $ans;

    }
}

var_dump((new Solution())->maxSlidingWindow([1, 3, -1, -3, 5, 3, 6, 7], 3));