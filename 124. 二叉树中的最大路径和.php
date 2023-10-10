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
    function maxPathSum($root)
    {
        $max = PHP_INT_MIN;
        $this->dfs($root, $max);

        return $max;
    }

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function dfs($root, &$max)
    {
        if (!$root) {
            return 0;
        }

        $left  = $this->dfs($root->left, $max);
        $right = $this->dfs($root->right, $max);

        $max = max($max, $left + $right + $root->val);

        return $root->val + max($left, $right) > 0 ? $root->val + max($left, $right) : 0;
    }
}