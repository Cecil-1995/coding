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

class CustomerSplPriorityQueue extends SplPriorityQueue
{
    function compare($priority1, $priority2)
    {
        return $priority2 - $priority1;
    }
}

class Solution
{

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists)
    {
        $queue = new CustomerSplPriorityQueue();
        $queue->setExtractFlags(SplPriorityQueue::EXTR_DATA);

        foreach ($lists as $list) {
            while ($list) {
                $queue->insert($list, $list->val);
                $list = $list->next;
            }
        }

        $pre   = new ListNode();
        $nodes = $pre;
        while (!$queue->isEmpty()) {
            $nodes->next = $queue->extract();
            $nodes       = $nodes->next;
            $nodes->next = null;
        }

        return $pre->next;
    }
}