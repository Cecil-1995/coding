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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $result = new ListNode(0);
        $pre    = $result;

        $temp = 0;
        while ($l1 && $l2) {
            $sum          = $l1->val + $l2->val + $temp;
            $result->next = new ListNode($sum % 10);
            $temp         = floor($sum / 10);
            $l1           = $l1->next;
            $l2           = $l2->next;
            $result       = $result->next;
        }
        while ($l1) {
            $sum          = $l1->val + $temp;
            $result->next = new ListNode($sum % 10);
            $temp         = floor($sum / 10);
            $l1           = $l1->next;
            $result       = $result->next;
        }
        while ($l2) {
            $sum          = $l2->val + $temp;
            $result->next = new ListNode($sum % 10);
            $temp         = floor($sum / 10);
            $l2           = $l2->next;
            $result       = $result->next;
        }
        if ($temp) {
            $result->next = new ListNode($temp);
        }

        return $pre->next;
    }
}