<?php

class MyCircularDeque
{
    public $stackFront;
    public $stackLast;
    public $k;

    /**
     * @param Integer $k
     */
    function __construct($k)
    {
        $this->stackLast  = [];
        $this->stackFront = [];
        $this->k          = $k;
    }

    /**
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value)
    {
        if ($this->isFull()) {
            return false;
        }

        array_push($this->stackFront, $value);

        return true;
    }

    /**
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value)
    {
        if ($this->isFull()) {
            return false;
        }

        array_push($this->stackLast, $value);

        return true;
    }

    /**
     * @return Boolean
     */
    function deleteFront()
    {
        if ($this->isEmpty()) {
            return false;
        }

        $this->getFront();
        array_pop($this->stackFront);

        return true;
    }

    /**
     * @return Boolean
     */
    function deleteLast()
    {
        if ($this->isEmpty()) {
            return false;
        }

        $this->getRear();
        array_pop($this->stackLast);

        return true;
    }

    /**
     * @return Integer
     */
    function getFront()
    {
        if ($this->isEmpty()) {
            return -1;
        }

        if (empty($this->stackFront)) {
            while ($this->stackLast) {
                array_push($this->stackFront, array_pop($this->stackLast));
            }
        }

        return $this->stackFront[count($this->stackFront) - 1];
    }

    /**
     * @return Integer
     */
    function getRear()
    {
        if ($this->isEmpty()) {
            return -1;
        }

        if (empty($this->stackLast)) {
            while ($this->stackFront) {
                array_push($this->stackLast, array_pop($this->stackFront));
            }
        }

        return $this->stackLast[count($this->stackLast) - 1];
    }

    /**
     * @return Boolean
     */
    function isEmpty()
    {
        return empty($this->stackFront) && empty($this->stackLast);
    }

    /**
     * @return Boolean
     */
    function isFull()
    {
        return count($this->stackLast) + count($this->stackFront) === $this->k;
    }
}

/**
 * Your MyCircularDeque object will be instantiated and called as such:
 * $obj = MyCircularDeque($k);
 * $ret_1 = $obj->insertFront($value);
 * $ret_2 = $obj->insertLast($value);
 * $ret_3 = $obj->deleteFront();
 * $ret_4 = $obj->deleteLast();
 * $ret_5 = $obj->getFront();
 * $ret_6 = $obj->getRear();
 * $ret_7 = $obj->isEmpty();
 * $ret_8 = $obj->isFull();
 */