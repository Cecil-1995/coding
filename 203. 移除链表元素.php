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
     * @param Integer $val
     * @return ListNode
     */
    function removeElements($head, $val)
    {
        $pre    = new ListNode(0, $head);
        $result = $pre;

        while ($pre->next) {
            if ($pre->next->val == $val) {
                $pre->next = $pre->next->next;
            } else {
                $pre = $pre->next;
            }
        }

        return $result->next;
    }
}