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
    function sortList($head)
    {
        if (!$head) {
            return null;
        }
        if (!$head->next) {
            return $head;
        }
        if (!$head->next->next) {
            return $this->sort($head);
        }

        $fast = $slow = $head;

        while ($fast && $fast->next) {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        $fast       = $slow->next;
        $slow->next = null;

        return $this->merge($this->sortList($head), $this->sortList($fast));
    }

    /**
     * @param ListNode $head1
     * @param ListNode $head2
     * @return ListNode
     */
    function merge($head1, $head2)
    {
        $pre = new ListNode();
        $p   = $pre;

        while ($head1 && $head2) {
            if ($head1->val < $head2->val) {
                $p->next = $head1;
                $p       = $p->next;

                $temp        = $head1->next;
                $head1->next = null;
                $head1       = $temp;
            } else {
                $p->next = $head2;
                $p       = $p->next;

                $temp        = $head2->next;
                $head2->next = null;
                $head2       = $temp;
            }
        }
        while ($head1) {
            $p->next = $head1;
            $p       = $p->next;

            $temp        = $head1->next;
            $head1->next = null;
            $head1       = $temp;
        }
        while ($head2) {
            $p->next = $head2;
            $p       = $p->next;

            $temp        = $head2->next;
            $head2->next = null;
            $head2       = $temp;
        }

        return $pre->next;
    }

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function sort($head)
    {
        if ($head->val <= $head->next->val) {
            return $head;
        }

        $pre        = $head->next;
        $pre->next  = $head;
        $head->next = null;

        return $pre;
    }
}