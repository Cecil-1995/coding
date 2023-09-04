<?php
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $next = null;
 *     public $random = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->next = null;
 *         $this->random = null;
 *     }
 * }
 */

class Solution
{
    /**
     * @param Node $head
     * @return Node
     */
    function copyRandomList($head)
    {
        $map   = [];
        $nodes = $head;
        while ($nodes) {
            $map[serialize($nodes)] = new ListNode($nodes->value);
            $nodes                  = $nodes->next;
        }

        $pre = new ListNode(0);
        $cur = $pre;
        while ($head) {
            $node = $map[serialize($head)];
            if ($head->next) {
                $node->next = $map[serialize($head->next)];
            }
            if ($head->random) {
                $node->random = $map[serialize($head->random)];
            }
            $cur->next = $node;
            $cur       = $cur->next;
            $head      = $head->next;
        }

        return $pre->next;
    }
}