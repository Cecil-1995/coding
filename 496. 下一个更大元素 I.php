<?php

class Solution
{

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function nextGreaterElement($nums1, $nums2)
    {
        $res   = [];
        $map   = [];
        $stack = [];

        for ($i = count($nums2) - 1; $i >= 0; --$i) {
            $num = $nums2[$i];
            while (!empty($stack) && $num > $stack[count($stack) - 1]) {
                array_pop($stack);
            }

            if (!empty($stack)) {
                $map[$num] = $stack[count($stack) - 1];
            } else {
                $map[$num] = -1;
            }
            array_push($stack, $num);
        }

        for ($i = 0; $i < count($nums1); ++$i) {
            $res[] = isset($map[$nums1[$i]]) ? $map[$nums1[$i]] : -1;
        }

        return $res;
    }
}

$a = new Solution();
var_dump($a->nextGreaterElement([4, 1, 2], [1, 3, 4, 2]));
