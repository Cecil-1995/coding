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
    function isValidBST($root)
    {
        return $this->isValid($root, null, null);
    }

    /**
     * @param TreeNode $root
     * @param TreeNode $max
     * @param TreeNode $min
     * @return Boolean
     */
    function isValid($root, $max, $min)
    {
        if ($root == null) {
            return true;
        }

        if ($max != null && $root->val >= $max->val) {
            return false;
        }
        if ($min != null && $root->val <= $min->val) {
            return false;
        }

        return $this->isValid($root->left, $root, $min) && $this->isValid($root->right, $max, $root);
    }

}