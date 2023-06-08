<?php

class RecentCounter
{
    public $map = [];

    /**
     */
    function __construct()
    {
        $this->map = [];
    }

    /**
     * @param Integer $t
     * @return Integer
     */
    function ping($t)
    {
        $this->map[] = $t;

        while (true) {
            $item = $this->map[0];
            if ($item + 3000 < $t) {
                array_shift($this->map);
            } else {
                break;
            }
        }

        return count($this->map);
    }
}

/**
 * Your RecentCounter object will be instantiated and called as such:
 * $obj = RecentCounter();
 * $ret_1 = $obj->ping($t);
 */