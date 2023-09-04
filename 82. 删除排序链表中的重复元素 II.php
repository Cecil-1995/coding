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
    function deleteDuplicates($head)
    {
        if (!$head) {
            return null;
        }

        $pre   = new ListNode(0, $head);
        $nodes = $pre;
        while ($nodes->next && $nodes->next->next) {
            if ($nodes->next->val === $nodes->next->next->val) {
                // 接下来的两个元素是一样的，删除
                $last        = $nodes->next->val;
                $nodes->next = $nodes->next->next->next;
            } else {
                // 判断下一个元素是不是已经出现过
                if (isset($last) && $last === $nodes->next->val) {
                    $last        = null;
                    $nodes->next = $nodes->next->next;
                } else {
                    $nodes = $nodes->next;
                }
            }
        }
        if ($nodes->next && isset($last) && $last === $nodes->next->val) {
            $nodes->next = $nodes->next->next;
        }

        return $pre->next;
    }
}