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
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k)
    {
        $pre = new ListNode(0, $head);

        $start = $pre;
        $end   = $pre;
        $i     = 0;
        while ($head) {
            $end  = $head;
            $head = $head->next;
            ++$i;
            if ($i === $k) {
                // 翻转
                $this->reverse();
                $start = $end;
            }
        }

        return $pre->next;
    }

    function reverse($head)
    {
        $pre = new ListNode(0, $head);
        $last = $pre;
        while ($head && $head->next) {
            $next = $head->next->next;
            $head->next->next = $head;
            $head->next = $next;


        }

        return $pre->next;
    }
}