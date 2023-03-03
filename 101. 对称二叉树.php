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
     * @return Boolean
     */
    function isSymmetric($root)
    {
        if (!isset($root)) {
            return true;
        }

        return $this->check($root->left, $root->right);
    }

    function check($left, $right)
    {
        if ($left == null || $right == null) {
            return $left == $right;
        }
        if ($left->val != $right->val) {
            return false;
        }

        return $this->check($left->left, $right->right) && $this->check($left->right, $right->left);

    }
}
