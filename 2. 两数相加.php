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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $result = $pre = new ListNode();
        $next = 0;
        while ($l1 || $l2) {
            $temp         = $next + ($l1->val ?? 0) + ($l2->val ?? 0);
            $next         = floor($temp / 10);
            $result->next = new ListNode($temp % 10);
            $result       = $result->next;
            $l1           = $l1->next;
            $l2           = $l2->next;
        }
        if ($next) {
            $result->next = new ListNode($next);
        }

        return $pre->next;
    }
}