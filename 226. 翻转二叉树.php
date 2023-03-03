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
     * @return TreeNode
     */
    function invertTree($root)
    {
        $left  = $root->left;
        $right = $root->right;
        if ($left !== null) {
            $root->right = $this->invertTree($left);
        } else {
            unset($root->right);
        }
        if ($right !== null) {
            $root->left = $this->invertTree($right);
        } else {
            unset($root->left);
        }

        return $root;
    }
}