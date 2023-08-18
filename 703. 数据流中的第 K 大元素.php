<?php

class CustomerSplPriorityQueue extends SplPriorityQueue
{
    function compare($priority1, $priority2)
    {
        return $priority2 - $priority1;
    }
}

class KthLargest
{
    public $queue;
    public $k;

    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums)
    {
        $this->queue = new CustomerSplPriorityQueue();
        $this->k     = $k;
        foreach ($nums as $num) {
            if ($this->queue->count() < $this->k) {
                $this->queue->insert($num, $num);
            } else {
                if ($this->queue->top() < $num) {
                    $this->queue->extract();
                    $this->queue->insert($num, $num);
                }
            }
        }
    }

    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val)
    {
        if ($this->queue->count() < $this->k) {
            $this->queue->insert($val, $val);
        } else {
            if ($this->queue->top() < $val) {
                $this->queue->extract();
                $this->queue->insert($val, $val);
            }
        }

        return $this->queue->top();
    }
}

/**
 * Your KthLargest object will be instantiated and called as such:
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */