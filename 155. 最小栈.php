<?php

class MinStack
{
    public $stack;
    public $minStack;

    /**
     */
    function __construct()
    {
        $this->stack    = [];
        $this->minStack = [];
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val)
    {
        $this->stack[] = $val;

        if (empty($this->minStack) || $val <= $this->minStack[count($this->minStack) - 1]) {
            $this->minStack[] = $val;
        }

        return null;
    }

    /**
     * @return NULL
     */
    function pop()
    {
        $item = array_pop($this->stack);

        if ($item === $this->minStack[count($this->minStack) - 1]) {
            array_pop($this->minStack);
        }

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
        return $this->minStack[count($this->minStack) - 1];
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */