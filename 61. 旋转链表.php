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
     * @param Integer $k
     * @return ListNode
     */
    function rotateRight($head, $k)
    {
        if (!$head) {
            return null;
        }

        $pre  = $head;
        $fast = $head;
        $slow = $head;
        $len  = 1;

        while ($pre->next) {
            ++$len;
            $pre = $pre->next;
        }
        $k = $k % $len;
        if ($k === 0) {
            return $head;
        }

        while ($fast->next) {
            if ($k <= 0) {
                $slow = $slow->next;
            }
            $fast = $fast->next;
            --$k;
        }

        $result     = $slow->next;
        $slow->next = null;
        $fast->next = $head;

        return $result;
    }
}