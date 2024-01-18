<?php

class SortedStack
{
    public $max;
    public $min;

    /**
     */
    function __construct()
    {
        $this->max = [];
        $this->min = [];
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function push($val)
    {
        while (true) {
            if (!empty($this->min) && $val > $this->min[count($this->min) - 1]) {
                $this->max[] = array_pop($this->min);
            } elseif (!empty($this->max) && $val < $this->max[count($this->max) - 1]) {
                $this->min[] = array_pop($this->max);
            } else {
                $this->min[] = $val;
                break;
            }
        }

        return null;
    }

    /**
     * @return NULL
     */
    function pop()
    {
        while (!empty($this->max)) {
            $this->min[] = array_pop($this->max);
        }
        if (!empty($this->min)) {
            array_pop($this->min);
        }

        return null;
    }

    /**
     * @return Integer
     */
    function peek()
    {
        while (!empty($this->max)) {
            $this->min[] = array_pop($this->max);
        }
        if (!empty($this->min)) {
            return $this->min[count($this->min) - 1];
        }

        return -1;
    }

    /**
     * @return Boolean
     */
    function isEmpty()
    {
        return empty($this->min) && empty($this->max);
    }
}

/**
 * Your SortedStack object will be instantiated and called as such:
 * $obj = SortedStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->isEmpty();
 */