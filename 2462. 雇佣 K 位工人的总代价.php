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
     * @param Integer[] $costs
     * @param Integer $k
     * @param Integer $candidates
     * @return Integer
     */
    function totalCost($costs, $k, $candidates)
    {
        $ans = 0;

        $leftPq  = new MinSplPriorityQueue();
        $rightPq = new MinSplPriorityQueue();
        $left    = 0;
        $right   = count($costs) - 1;

        while ($left <= $right && $left < $candidates) {
            $leftPq->insert($costs[$left], $costs[$left]);
            ++$left;
        }
        while ($left <= $right && count($costs) - 1 - $right < $candidates) {
            $rightPq->insert($costs[$right], $costs[$right]);
            --$right;
        }

        for ($i = 0; $i < $k && $left <= $right; ++$i) {
            if (!$leftPq->isEmpty() && !$rightPq->isEmpty()) {
                if ($leftPq->top() <= $rightPq->top()) {
                    $ans += $leftPq->extract();
                    $leftPq->insert($costs[$left], $costs[$left++]);
                } else {
                    $ans += $rightPq->extract();
                    $rightPq->insert($costs[$right], $costs[$right--]);
                }
            } else {
                break;
            }
        }

        while ($i < $k) {
            if ($leftPq->isEmpty()) {
                $ans += $rightPq->extract();
            } elseif ($rightPq->isEmpty()) {
                $ans += $leftPq->extract();
            } else {
                if ($leftPq->top() <= $rightPq->top()) {
                    $ans += $leftPq->extract();
                } else {
                    $ans += $rightPq->extract();
                }
            }

            ++$i;
        }

        return $ans;
    }
}