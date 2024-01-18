<?php

class TripleInOne
{
    public $stack;
    public $stackIndex;
    public $stackSize;

    /**
     * @param Integer $stackSize
     */
    function __construct($stackSize)
    {
        $this->stack      = [];
        $this->stackIndex = [];
        $this->stackSize  = $stackSize;
    }

    /**
     * @param Integer $stackNum
     * @param Integer $value
     * @return NULL
     */
    function push($stackNum, $value)
    {
        $index = $stackNum * $this->stackSize;
        if (!isset($this->stackIndex[$stackNum])) {
            $this->stackIndex[$stackNum] = 0;
        }

        if ($this->stackIndex[$stackNum] !== $this->stackSize) {
            $this->stack[$index + $this->stackIndex[$stackNum]] = $value;
            ++$this->stackIndex[$stackNum];
        }

        return null;
    }

    /**
     * @param Integer $stackNum
     * @return Integer
     */
    function pop($stackNum)
    {
        $index = $stackNum * $this->stackSize;
        if (!isset($this->stackIndex[$stackNum])) {
            $this->stackIndex[$stackNum] = 0;
        }

        if ($this->stackIndex[$stackNum] === 0) {
            // 为空
            return -1;
        } else {
            $value = $this->stack[$index + $this->stackIndex[$stackNum] - 1];
            unset($this->stack[$index + $this->stackIndex[$stackNum] - 1]);
            --$this->stackIndex[$stackNum];

            return $value;
        }
    }

    /**
     * @param Integer $stackNum
     * @return Integer
     */
    function peek($stackNum)
    {
        $index = $stackNum * $this->stackSize;
        if (!isset($this->stackIndex[$stackNum])) {
            $this->stackIndex[$stackNum] = 0;
        }

        if ($this->stackIndex[$stackNum] === 0) {
            // 为空
            return -1;
        } else {
            return $this->stack[$index + $this->stackIndex[$stackNum] - 1];
        }
    }

    /**
     * @param Integer $stackNum
     * @return Boolean
     */
    function isEmpty($stackNum)
    {
        return !isset($this->stackIndex[$stackNum]) || $this->stackIndex[$stackNum] === 0;
    }
}

/**
 * Your TripleInOne object will be instantiated and called as such:
 * $obj = TripleInOne($stackSize);
 * $obj->push($stackNum, $value);
 * $ret_2 = $obj->pop($stackNum);
 * $ret_3 = $obj->peek($stackNum);
 * $ret_4 = $obj->isEmpty($stackNum);
 */