<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

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
     * @param TreeNode $tree
     * @return ListNode[]
     */
    function listOfDepth($tree)
    {
        if (!$tree) {
            return [];
        }

        $ans  = [];
        $list = [$tree];

        while (!empty($list)) {
            $count = count($list);
            $nodes = new ListNode(0);
            $pre   = $nodes;
            while ($count--) {
                $item        = array_shift($list);
                $nodes->next = new ListNode($item->val);
                $nodes       = $nodes->next;
                if ($item->left) {
                    array_push($list, $item->left);
                }
                if ($item->right) {
                    array_push($list, $item->right);
                }
            }
            $ans[] = $pre->next;
        }

        return $ans;
    }
}