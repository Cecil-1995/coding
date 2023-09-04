<?php

class RandomizedSet
{
    public $map   = [];
    public $list  = [];
    public $count = 0;

    /**
     */
    function __construct()
    {
    }

    /**
     * @param Integer $val
     * @return Boolean
     */
    function insert($val)
    {
        if (isset($this->map[$val])) {
            return false;
        }

        $this->map[$val]            = $this->count;
        $this->list[$this->count++] = $val;

        return true;
    }

    /**
     * @param Integer $val
     * @return Boolean
     */
    function remove($val)
    {
        if (!isset($this->map[$val])) {
            return false;
        }

        $index = $this->map[$val];
        $this->list[$index]             = $this->list[$this->count - 1];
        $this->map[$this->list[$index]] = $index;
        --$this->count;
        unset($this->map[$val]);

        return true;
    }

    /**
     * @return Integer
     */
    function getRandom()
    {
        return $this->list[rand(0, $this->count - 1)];
    }
}

/**
 * Your RandomizedSet object will be instantiated and called as such:
 * $obj = RandomizedSet();
 * $ret_1 = $obj->insert($val);
 * $ret_2 = $obj->remove($val);
 * $ret_3 = $obj->getRandom();
 */