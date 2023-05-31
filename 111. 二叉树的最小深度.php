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
     * @return Integer
     */
    function minDepth($root)
    {
        if (!$root) {
            return 0;
        } else {
            $left                = $this->minDepth($root->left);
            $right                = $this->minDepth($root->right);
            if ($left == 0) {
                return $right + 1;
            }
            if ($right == 0) {
                return $left + 1;
            }

            return min($left, $right) + 1;
        }
    }

}