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
    function isBalanced($root)
    {
        $this->maxDepth($root);

        return $this->isBalanced;
    }

    public $isBalanced = true;

    function maxDepth($root)
    {
        if (!isset($root)) {
            return 0;
        }

        $left  = $this->maxDepth($root->left);
        $right = $this->maxDepth($root->right);

        if (abs($left - $right) > 1) {
            $this->isBalanced = false;
        }

        return max($left, $right) + 1;
    }
}
