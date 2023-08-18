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
        $l1Len = $l2Len = 0;
        $p1    = $l1;
        $p2    = $l2;
        $flag1 = $flag2 = true;
        while ($p1) {
            if ($flag1 && $p1->val == 0) {
                // 头结点为0
                $l1 = $l1->next;
                $p1 = $p1->next;
                continue;
            }
            $flag1 = false;

            ++$l1Len;
            $p1 = $p1->next;
        }
        while ($p2) {
            if ($flag2 && $p2->val == 0) {
                // 头结点为0
                $l2 = $l2->next;
                $p2 = $p2->next;
                continue;
            }
            $flag2 = false;

            ++$l2Len;
            $p2 = $p2->next;
        }

        if (!$l1 && !$l2) {
            return new ListNode();
        } elseif (!$l1) {
            return $l2;
        } elseif (!$l2) {
            return $l1;
        }

        $p3 = new ListNode();   // 结果链表
        $p4 = new ListNode();   // 进位链表
        $l3 = $p3;
        $l4 = $p4;
        while ($l1Len || $l2Len) {
            if ($l1Len > $l2Len) {
                $p3->next = new ListNode($l1->val);
                $p4->next = new ListNode(0);
                $l1       = $l1->next;
                --$l1Len;
            } elseif ($l1Len < $l2Len) {
                $p3->next = new ListNode($l2->val);
                $p4->next = new ListNode(0);
                $l2       = $l2->next;
                --$l2Len;
            } else {
                $p3->next = new ListNode(($l2->val + $l1->val) % 10);
                $p4->next = new ListNode(floor(($l2->val + $l1->val) / 10));
                $l2       = $l2->next;
                $l1       = $l1->next;
                --$l2Len;
                --$l1Len;
            }
            $p3 = $p3->next;
            $p4 = $p4->next;
        }
        $p4->next = new ListNode(0);

        return $this->addTwoNumbers($l3->next, $l4->next);
    }
}