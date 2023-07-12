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
    function swapPairs($head)
    {
        if (!$head) {
            return null;
        }
        if (!$head->next) {
            return $head;
        }

        $pre    = new ListNode(0, $head);
        $result = $pre;
        while ($pre->next && $pre->next->next) {
            $nextPairs = $pre->next->next->next;
            // 交换节点
            $next                  = $pre->next;
            $pre->next             = $pre->next->next;
            $pre->next->next       = $next;
            $pre->next->next->next = $nextPairs;

            $pre = $pre->next->next;
        }

        return $result->next;
    }
}