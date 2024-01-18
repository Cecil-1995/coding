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
    function isPalindrome($head)
    {
        $slow       = new ListNode(0);
        $slow->next = $head;
        $fast       = $slow;
        if (!$fast->next || !$fast->next->next) {
            return true;
        }

        while ($fast->next && $fast->next->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        if ($fast->next) {
            $fast = $this->traverse($slow->next->next);
        } else {
            $fast = $this->traverse($slow->next);
        }
        $slow->next = null;
        $slow       = $head;

        while ($slow || $fast) {
            if (!$slow || !$fast || $slow->val !== $fast->val) {
                return false;
            }
            $slow = $slow->next;
            $fast = $fast->next;
        }

        return true;
    }

    function traverse($head)
    {
        if (!$head || !$head->next) {
            return $head;
        }

        $next      = $this->traverse($head->next);
        $pre       = new ListNode(0);
        $pre->next = $next;
        while ($next->next) {
            $next = $next->next;
        }
        $next->next = $head;
        $head->next = null;

        return $pre->next;
    }
}