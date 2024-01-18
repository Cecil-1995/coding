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
    public $size;

    /**
     * initialize your data structure here.
     */
    function __construct()
    {
        $this->maxQueue = new SplPriorityQueue();
        $this->minQueue = new MinSplPriorityQueue();
        $this->size     = 0;
    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function addNum($num)
    {
        ++$this->size;

        if ($this->size % 2) {
            // 奇数到max中去
            if ($this->minQueue->isEmpty()) {
                $this->maxQueue->insert($num, $num);

                return null;
            }
            $min = $this->minQueue->top();
            if ($min >= $num) {
                $this->maxQueue->insert($num, $num);
            } else {
                $this->maxQueue->insert($min, $this->minQueue->extract());
                $this->minQueue->insert($num, $num);
            }
        } else {
            // 偶数到min中去
            if ($this->maxQueue->isEmpty()) {
                $this->minQueue->insert($num, $num);

                return null;
            }
            $max = $this->maxQueue->top();
            if ($max <= $num) {
                $this->minQueue->insert($num, $num);
            } else {
                $this->minQueue->insert($max, $this->maxQueue->extract());
                $this->maxQueue->insert($num, $num);
            }
        }

        return null;
    }

    /**
     * @return Float
     */
    function findMedian()
    {
        if ($this->size % 2) {
            return $this->maxQueue->top();
        } else {
            return $this->maxQueue->top() / 2 + $this->minQueue->top() / 2;
        }
    }
}

/**
 * Your MedianFinder object will be instantiated and called as such:
 * $obj = MedianFinder();
 * $obj->addNum($num);
 * $ret_2 = $obj->findMedian();
 */