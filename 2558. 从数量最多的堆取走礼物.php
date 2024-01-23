<?php

class Solution
{

    /**
     * @param Integer[] $gifts
     * @param Integer $k
     * @return Integer
     */
    function pickGifts($gifts, $k)
    {
        $queue = new SplPriorityQueue();
        foreach ($gifts as $gift) {
            $queue->insert($gift, $gift);
        }

        while ($k) {
            $max = floor(sqrt($queue->extract()));
            $queue->insert($max, $max);
            --$k;
        }

        $ans = 0;
        while (!$queue->isEmpty()) {
            $ans += $queue->extract();
        }

        return $ans;
    }
}