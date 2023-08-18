<?php

class MedianFinder
{
    public $list  = [];
    public $count = 0;

    /**
     */
    function __construct()
    {

    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function addNum($num)
    {
        $left  = 0;
        $right = $this->count - 1;

        while ($left <= $right) {
            $mid = floor(($right - $left) / 2) + $left;
            if ($this->list[$mid] > $num) {
                $right = $mid - 1;
            } elseif ($this->list[$mid] < $num) {
                $left = $mid + 1;
            } else {
                $left = $mid + 1;
            }
        }

        if ($right === -1) {
            // 在最前面插入
            array_unshift($this->list, $num);
        } elseif ($left === $this->count) {
            // 在最后面插入
            $this->list[] = $num;
        } else {
            // 在right后面插入
            for ($i = $this->count; $i > $right + 1; --$i) {
                $this->list[$i] = $this->list[$i - 1];
            }
            $this->list[$right + 1] = $num;
        }

        ++$this->count;

        return null;
    }

    /**
     * @return Float
     */
    function findMedian()
    {
        if ($this->count % 2) {
            return $this->list[floor($this->count / 2)];
        } else {
            $mid = $this->count / 2;

            return $this->list[$mid] / 2 + $this->list[$mid - 1] / 2;
        }
    }
}

/**
 * Your MedianFinder object will be instantiated and called as such:
 * $obj = MedianFinder();
 * $obj->addNum($num);
 * $ret_2 = $obj->findMedian();
 */