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
    function removeDuplicateNodes($head)
    {
        $map = [];

        $pre    = $head;
        $before = $head;
        while ($head) {
            if (!isset($map[$head->val])) {
                $map[$head->val] = true;
                $before          = $head;
                $head            = $head->next;
            } else {
                $before->next = $head->next;
                $head->next   = null;
                $head         = $before->next;
            }
        }

        return $pre;
    }

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function removeDuplicateNodes2($head)
    {
        $pre = $head;
        while ($head) {
            $pre2   = $head->next;
            $before = $head;
            while ($pre2) {
                if ($pre2->val === $head->val) {
                    $before->next = $pre2->next;
                    $pre2->next   = null;
                    $pre2         = $before->next;
                } else {
                    $before = $pre2;
                    $pre2   = $pre2->next;
                }
            }
            $head = $head->next;
        }

        return $pre;
    }
}