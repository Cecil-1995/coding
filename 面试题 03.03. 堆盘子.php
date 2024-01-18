<?php

class StackOfPlates
{
    public $stack;
    public $cap;

    /**
     * @param Integer $cap
     */
    function __construct($cap)
    {
        $this->stack = [];
        $this->cap   = $cap;
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val)
    {
        if ($this->cap < 1) {
            return null;
        }


        if (empty($this->stack) || count($this->stack[count($this->stack) - 1]) === $this->cap) {
            $this->stack[] = [$val];

            return null;
        }
        array_push($this->stack[count($this->stack) - 1], $val);

        return null;
    }

    /**
     * @return Integer
     */
    function pop()
    {
        return $this->popAt(count($this->stack) - 1);
    }

    /**
     * @param Integer $index
     * @return Integer
     */
    function popAt($index)
    {
        if ($index < 0 || $index > count($this->stack) - 1) {
            return -1;
        }

        $rows = $this->stack[$index];
        if (empty($rows)) {
            return -1;
        }
        $ans         = array_pop($this->stack[$index]);
        $this->stack = array_values(array_filter($this->stack));

        return $ans;
    }
}

/**
 * Your StackOfPlates object will be instantiated and called as such:
 * $obj = StackOfPlates($cap);
 * $obj->push($val);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->popAt($index);
 */