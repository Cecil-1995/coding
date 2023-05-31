<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root)
    {
        if (!$root) {
            return [];
        }

        $result = [];
        $stack  = [$root];
        while (!empty($stack)) {
            $item     = array_pop($stack);
            if (isset($item->right)) {
                $stack[] = $item->right;
            }
            if (isset($item->left)) {
                $stack[] = $item->left;
            }
            $result[] = $item->val;
        }

        return $result;
    }
}