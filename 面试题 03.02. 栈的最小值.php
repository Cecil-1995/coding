<?php

class MinStack
{
    public $stack;
    public $min;

    /**
     * initialize your data structure here.
     */
    function __construct()
    {
        $this->stack = [];
        $this->min   = [];
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->stack[] = $x;
        if (empty($this->min) || $this->min[count($this->min) - 1] >= $x) {
            $this->min[] = $x;
        } else {
            $this->min[] = $this->min[count($this->min) - 1];
        }

        return null;
    }

    /**
     * @return NULL
     */
    function pop()
    {
        array_pop($this->stack);
        array_pop($this->min);

        return null;
    }

    /**
     * @return Integer
     */
    function top()
    {
        return $this->stack[count($this->stack) - 1];
    }

    /**
     * @return Integer
     */
    function getMin()
    {
        return $this->min[count($this->min) - 1];
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */