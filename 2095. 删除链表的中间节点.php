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
    function deleteMiddle($head)
    {
        $result = new ListNode(0, $head);
        $fast   = $head;
        $pre    = $result;

        while ($fast->next && $fast->next->next) {
            $pre  = $head;
            $head = $head->next;
            $fast = $fast->next->next;
        }

        if ($fast->next) {
            // 删除head下一个节点
            $head->next = $head->next->next;
        } else {
            // 删除head节点
            $pre->next = $pre->next->next;
        }

        return $result->next;
    }
}