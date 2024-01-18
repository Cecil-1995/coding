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
     * @param Integer $x
     * @return ListNode
     */
    function partition($head, $x)
    {
        $node1 = new ListNode(0);
        $node2 = new ListNode(0);
        $pre1  = $node1;
        $pre2  = $node2;

        while ($head) {
            $next = $head->next;
            if ($head->val < $x) {
                $node1->next = $head;
                $node1       = $node1->next;
                $node1->next = null;
            } else {
                $node2->next = $head;
                $node2       = $node2->next;
                $node2->next = null;
            }
            $head = $next;
        }
        $node1->next = $pre2->next;

        return $pre1->next;
    }
}