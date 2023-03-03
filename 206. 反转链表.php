<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head)
    {
        if ($head === null || $head->next === null) {
            return $head;
        }

        $last = $this->reverseList($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $last;
    }

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList2($head)
    {
        $pre = null;
        while ($head) {
            $next = $head->next;
            $head->next = $pre;
            $pre = $head;
            $head = $next;
        }

        return $pre;
    }
}