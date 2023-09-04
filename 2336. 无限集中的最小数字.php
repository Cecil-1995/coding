<?php

class MinSplPriorityQueue extends SplPriorityQueue
{
    function compare($priority1, $priority2)
    {
        return $priority2 - $priority1;
    }
}

class SmallestInfiniteSet
{
    public $min;
    public $list;
    public $map;

    /**
     */
    function __construct()
    {
        $this->min  = 1;
        $this->list = new MinSplPriorityQueue();
        $this->map  = [];
    }

    /**
     * @return Integer
     */
    function popSmallest()
    {
        if ($this->list->isEmpty()) {
            return $this->min++;
        } else {
            $num = $this->list->extract();
            unset($this->map[$num]);

            return $num;
        }
    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function addBack($num)
    {
        if ($num < $this->min && !isset($this->map[$num])) {
            $this->list->insert($num, $num);
            $this->map[$num] = true;
        }

        return null;
    }
}

/**
 * Your SmallestInfiniteSet object will be instantiated and called as such:
 * $obj = SmallestInfiniteSet();
 * $ret_1 = $obj->popSmallest();
 * $obj->addBack($num);
 */