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
    function goodNodes($root)
    {
        return $this->goodNodesByMax($root, $root->val);
    }

    /**
     * @param TreeNode $root
     * @param int $max
     * @return Integer
     */
    function goodNodesByMax($root, $max)
    {
        if (!$root) {
            return 0;
        }

        $current = $root->val >= $max ? 1 : 0;
        $max     = max($root->val, $max);

        return $this->goodNodesByMax($root->left, $max) + $this->goodNodesByMax($root->right, $max) + $current;
    }
}