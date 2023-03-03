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
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    function getIntersectionNode($headA, $headB)
    {
        if ($headA === null || $headB === null) {
            return null;
        }

        $p1 = $headA;
        $p2 = $headB;
        while ($p1 !== $p2) {
            $p1 = $p1 === null ? $headB : $p1->next;
            $p2 = $p2 === null ? $headA : $p2->next;
        }

        return $p1;
    }
}