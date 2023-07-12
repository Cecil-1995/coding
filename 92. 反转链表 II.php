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
     * @param Integer $left
     * @param Integer $right
     * @return ListNode
     */
    function reverseBetween($head, $left, $right)
    {
        $pre      = new ListNode(0, $head);
        $listNode = $pre;

        $index = 0;
        while ($listNode->next) {
            ++$index;

            if ($index >= $left && $index <= $right) {
                if ($index === $left) {
                    $last = $listNode;
                } else {
                    $next = $listNode->next->next;

                    $listNodePre = $last->next;
                    $last->next  = $listNode->next;

                    $listNode->next->next = $listNodePre;
                    $listNode->next       = $next;
                    continue;
                }
            }
            $listNode = $listNode->next;
        }

        return $pre->next;
    }
}