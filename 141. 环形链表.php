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
     * @return Boolean
     */
    function hasCycle($head)
    {
        $fast = $slow = $head;

        while ($fast && $fast->next) {
            $fast = $fast->next->next;
            $slow = $slow->next;

            if ($fast === $slow) {
                return true;
            }
        }

        return false;
    }
}