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
        $pre = new ListNode();
        $ans = $pre;

        $nodes = $head;
        $i     = 0;
        while ($nodes) {
            if (++$i === $k) {
                // 翻转
                $i    = 0;
                $next = $nodes->next;

                $nodes->next = null;
                $pre->next   = $this->reverse($head);
                while ($pre->next) {
                    $pre = $pre->next;
                }

                $head  = $next;
                $nodes = $next;
            } else {
                $nodes = $nodes->next;
            }
        }
        if ($head) {
            $pre->next = $head;
        }

        return $ans->next;
    }

    function reverse($head)
    {
        $pre = new ListNode(0, $head);

        $last = $head;
        $head = $head->next;
        while ($head) {
            $next = $head->next;

            $head->next = $pre->next;
            $pre->next  = $head;
            $last->next = $next;

            $head = $next;
        }

        return $pre->next;
    }
}