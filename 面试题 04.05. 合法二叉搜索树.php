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
class Solution
{

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root)
    {
        return $this->helper($root, null, null);
    }

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function helper($root, $max, $min)
    {
        if (!$root) {
            return true;
        }

        $left  = true;
        $right = true;
        if ($root->left) {
            if ($root->left->val < $root->val && (!isset($min) || $min < $root->left->val)) {
                $left = $this->helper($root->left, $root->val, $min);
            } else {
                return false;
            }
        }
        if ($root->right) {
            if ($root->right->val > $root->val && (!isset($max) || $max > $root->right->val)) {
                $right = $this->helper($root->right, $max, $root->val);
            } else {
                return false;
            }
        }

        return $left && $right;
    }
}