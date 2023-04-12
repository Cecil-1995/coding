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
     * @return ListNode
     */
    function detectCycle($head)
    {
        $slow = $fast = $head;

        while ($fast && $fast->next) {
            $fast = $fast->next->next;
            $slow = $slow->next;

            if ($fast === $slow) {
                break;
            }
        }
        if (!$fast || !$fast->next) {
            return null;
        }

        $slow = $head;
        while ($slow !== $fast) {
            $slow = $slow->next;
            $fast = $fast->next;
        }

        return $slow;
    }
}