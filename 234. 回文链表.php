<?php


class ListNode
{
    public $val  = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val  = $val;
        $this->next = $next;
    }
}

class Solution
{

    /**
     * @param ListNode $head
     * @return Boolean
     */
    function isPalindrome($head)
    {











//        $node = $head;
//        $arr  = [];
//        while ($node) {
//            $arr[] = $node->val;
//            $node  = $node->next;
//        }
//
//        $l = 0;
//        $r = count($arr) - 1;
//        while ($l <= $r) {
//            if ($arr[$l] === $arr[$r]) {
//                ++$l;
//                --$r;
//            } else {
//                return false;
//            }
//        }
//
//        return true;
    }

    /**
     * @param ListNode $root
     */
    //    function r($root)
    //    {
    //        if ($root === null || $root->next === null) {
    //            return $root;
    //        }
    //
    //        $last             = $this->r($root->next);
    //        $root->next->next = $root;
    //        $root->next       = null;
    //
    //        return $last;
    //    }

    //    function r2($root)
    //    {
    //        $pre = null;
    //
    //        while ($root) {
    //            $next = $root->next;
    ////            $root->next->next = $root;
    //            $root->next = $pre;
    //            $pre = $root;
    //            $root = $next;
    //        }
    //
    //        return $pre;
    //    }
}

$node = new ListNode(1, new ListNode(2, new ListNode(2, new ListNode(1))));

var_dump((new Solution())->isPalindrome($node));
