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
    function oddEvenList($head)
    {
        if (!$head) {
            return null;
        }

        $prev = $head;
        $odd  = $head;
        $last = $head;
        $i    = 0;
        while ($prev) {
            ++$i;
            $next = $prev->next;
            if ($i % 2 && $i !== 1) {
                $prev->next = $odd->next;
                $odd->next  = $prev;
                $odd        = $odd->next;

                $last->next = $next;
            } else {
                $last = $prev;
            }
            $prev = $next;
        }

        return $head;
    }
}