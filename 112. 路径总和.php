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
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum($root, $targetSum)
    {
        if ($root == null) {
            return false;
        }

        $targetSum -= $root->val;
        if ($root->left == null && $root->right == null && $targetSum == 0) {
            return true;
        }

        return $this->hasPathSum($root->left, $targetSum) || $this->hasPathSum($root->right, $targetSum);
    }
}