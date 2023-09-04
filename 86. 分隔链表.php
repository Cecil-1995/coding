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
     * @param Integer $x
     * @return ListNode
     */
    function partition($head, $x)
    {
        if (!$head) {
            return null;
        }

        $pre = new ListNode(0, $head);

        while ($head) {
            if ($head->val >= $x) {

            }
        }




        $slow = $pre;
        $last = $pre;
        while ($head) {
            if ($head->val >= $x) {
                // 当前节点大于等于x,不需要修改
                $last = $head;
                $head = $head->next;
            } else {
                // 当前节点小于x,移到slow节点去
                $next       = $head->next;
                $last->next = $next;
                $head->next = $slow->next;
                $slow->next = $head;
                $head       = $next;
            }
        }

        return $pre->next;
    }
}