<?php

class StockSpanner
{
    public $stack;

    /**
     */
    function __construct()
    {
        $this->stack = [];
    }

    /**
     * @param Integer $price
     * @return Integer
     */
    function next($price)
    {
        $result = 1;
        for ($i = count($this->stack) - 1; $i >= 0; --$i) {
            if ($this->stack[$i] > $price) {
                break;
            }
            ++$result;
        }
        $this->stack[] = $price;

        return $result;
    }
}

/**
 * Your StockSpanner object will be instantiated and called as such:
 * $obj = StockSpanner();
 * $ret_1 = $obj->next($price);
 */