<?php

class MinSplPriorityQueue extends SplPriorityQueue
{
    function compare($priority1, $priority2)
    {
        return $priority2 - $priority1;
    }
}

class MedianFinder
{
    public $maxQueue;
    public $minQueue;
    public $count;

    /**
     */
    function __construct()
    {
        $this->maxQueue = new SplPriorityQueue();
        $this->minQueue = new MinSplPriorityQueue();
        $this->count    = 0;
    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function addNum($num)
    {
        if ($this->count % 2 === 0) {
            // 目前是偶数，放在max中
            if ($this->minQueue->isEmpty()) {
                $this->maxQueue->insert($num, $num);
            } else {
                if ($this->minQueue->top() >= $num) {
                    $this->maxQueue->insert($num, $num);
                } else {
                    $this->maxQueue->insert($this->minQueue->top(), $this->minQueue->extract());
                    $this->minQueue->insert($num, $num);
                }
            }
        } else {
            // 目前是奇数，放在min中
            if ($this->maxQueue->top() <= $num) {
                $this->minQueue->insert($num, $num);
            } else {
                $this->minQueue->insert($this->maxQueue->top(), $this->maxQueue->extract());
                $this->maxQueue->insert($num, $num);
            }
        }

        ++$this->count;

        return null;
    }

    /**
     * @return Float
     */
    function findMedian()
    {
        if ($this->count % 2 === 0) {
            return $this->minQueue->top() / 2 + $this->maxQueue->top() / 2;
        } else {
            return $this->maxQueue->top();
        }
    }
}

/**
 * Your MedianFinder object will be instantiated and called as such:
 * $obj = MedianFinder();
 * $obj->addNum($num);
 * $ret_2 = $obj->findMedian();
 */