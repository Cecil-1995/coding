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
    public $min    = PHP_INT_MAX;
    public $before = -1;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function getMinimumDifference($root)
    {
        if (!$root) {
            return 0;
        }

        if (isset($root->left)) {
            $this->getMinimumDifference($root->left);
        }

        if ($this->before !== -1) {
            $this->min = min($this->min, $root->val - $this->before);
        }
        $this->before = $root->val;

        if (isset($root->right)) {
            $this->getMinimumDifference($root->right);
        }

        return $this->min;
    }
}