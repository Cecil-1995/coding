<?php

class MyQueue
{
    public $inStack;
    public $outStack;

    /**
     * Initialize your data structure here.
     */
    function __construct()
    {
        $this->inStack  = [];
        $this->outStack = [];
    }

    /**
     * Push element x to the back of queue.
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->inStack[] = $x;

        return null;
    }

    /**
     * Removes the element from in front of queue and returns that element.
     * @return Integer
     */
    function pop()
    {
        if (empty($this->outStack)) {
            while (!empty($this->inStack)) {
                array_push($this->outStack, array_pop($this->inStack));
            }
        }

        return array_pop($this->outStack);
    }

    /**
     * Get the front element.
     * @return Integer
     */
    function peek()
    {
        $item = $this->pop();
        array_push($this->outStack, $item);

        return $item;
    }

    /**
     * Returns whether the queue is empty.
     * @return Boolean
     */
    function empty()
    {
        return empty($this->inStack) && empty($this->outStack);
    }
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */