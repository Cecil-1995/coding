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
    public $max = PHP_INT_MIN;
    public $min = PHP_INT_MAX;

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root)
    {
        var_dump($this->max);
        var_dump($this->min);
        if (!$root) {
            return true;
        }
        if ($root->left) {
            if (!$this->isValidBST($root->left)) {
                return false;
            }
            $this->max = $root->left->val;
        }

        if ($root->val <= $this->max) {
            return false;
        }

        if ($root->right) {
            if (!$this->isValidBST($root->right)) {
                return false;
            }
            $this->min = $root->right->val;
        }

        if ($root->val >= $this->min) {
            return false;
        }

        return true;
    }
}