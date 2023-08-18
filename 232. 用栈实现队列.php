<?php

class MyQueue
{
    public $stack1;
    public $stack2;

    /**
     */
    function __construct()
    {
        $this->stack1 = [];
        $this->stack2 = [];
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        while ($this->stack1) {
            array_push($this->stack2, array_pop($this->stack1));
        }
        array_push($this->stack2, $x);

        while ($this->stack2) {
            array_push($this->stack1, array_pop($this->stack2));
        }

        return null;
    }

    /**
     * @return Integer
     */
    function pop()
    {
        return array_pop($this->stack1);
    }

    /**
     * @return Integer
     */
    function peek()
    {
        return $this->stack1[count($this->stack1) - 1];
    }

    /**
     * @return Boolean
     */
    function empty()
    {
        return empty($this->stack1);
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