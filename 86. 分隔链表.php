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

        $smallPre = new ListNode();
        $small    = $smallPre;
        $bigPre   = new ListNode();
        $big      = $bigPre;

        while ($head) {
            $item       = $head;
            $head       = $head->next;
            $item->next = null;
            if ($item->val < $x) {
                $small->next = $item;
                $small       = $small->next;
            } else {
                $big->next = $item;
                $big       = $big->next;
            }
        }
        $small->next = $bigPre->next;

        return $smallPre->next;
    }
}