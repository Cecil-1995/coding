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
     * @return Integer
     */
    function pairSum($head)
    {
        $fast = $slow = $head;

        $n = 0;
        while ($fast && $fast->next) {
            $n    += 2;
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        $max = [];
        while ($slow) {
            $max[] = $slow->val;
            $slow  = $slow->next;
        }

        for ($i = count($max) - 1; $i >= 0; --$i) {
            $max[$i] += $head->val;
            $head    = $head->next;
        }

        return max($max);
    }
}