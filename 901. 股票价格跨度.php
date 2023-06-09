<?php

class StockSpanner
{
    public $stack;
    public $weight;

    /**
     */
    function __construct()
    {
        $this->stack  = [];
        $this->weight = [];
    }

    /**
     * @param Integer $price
     * @return Integer
     */
    function next($price)
    {
        $weight = 1;
        while (!empty($this->stack)) {
            $item = array_pop($this->stack);
            if ($item <= $price) {
                $weight += array_pop($this->weight);
            } else {
                $this->stack[] = $item;
                break;
            }
        }
        $this->stack[]  = $price;
        $this->weight[] = $weight;

        return $weight;
    }
}

/**
 * Your StockSpanner object will be instantiated and called as such:
 * $obj = StockSpanner();
 * $ret_1 = $obj->next($price);
 */