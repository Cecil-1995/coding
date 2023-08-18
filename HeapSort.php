<?php

class HeapSort
{
    public function sort($nums)
    {
        $n = count($nums);
        for ($i = floor($n / 2) - 1; $i >= 0; --$i) {
            $this->customerHeapSort($nums, $i, $n);
        }

        for ($i = $n - 1; $i > 0; --$i) {
            $this->swap($nums, 0, $i);
            $this->customerHeapSort($nums, 0, $i);
        }

        return $nums;
    }

    public function customerHeapSort(&$nums, $i, $n)
    {
        $children = 2 * $i + 1;

        if ($children + 1 < $n && $nums[$children] < $nums[$children + 1]) {
            ++$children;
        }
        if ($children < $n && $nums[$i] < $nums[$children]) {
            $this->swap($nums, $i, $children);
            $this->customerHeapSort($nums, $children, $n);
        }
    }

    public function swap(&$arr, $i, $j)
    {
        $temp    = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }
}

var_dump((new HeapSort())->sort([1, 5, 34, 6, 87, 12, 4, 6, 89, 6]));