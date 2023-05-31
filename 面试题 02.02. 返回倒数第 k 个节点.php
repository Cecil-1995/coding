<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return Integer
     */
    function kthToLast($head, $k)
    {
        $pre = $head;
        while ($k) {
            $pre = $pre->next;
            --$k;
        }

        while ($pre) {
            $pre  = $pre->next;
            $head = $head->next;
        }

        return $head->val;
    }
}