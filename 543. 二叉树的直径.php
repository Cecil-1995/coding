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
    public $currMax = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root)
    {
        $this->maxDepth($root);

        return $this->currMax;
    }

    /**
     * @param TreeNode $root
     */
    function maxDepth($root)
    {
        if ($root == null) {
            return 0;
        }

        $left  = $this->maxDepth($root->left);
        $right = $this->maxDepth($root->right);

        $this->currMax = max($this->currMax, $left + $right);

        return max($left, $right) + 1;

    }
}
