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
    function distributeCoins($root)
    {
        if (!$root) {
            return 0;
        }
        $ans = 0;

        $this->distributeCoinsBack($root, $ans);

        return $ans;
    }

    /**
     * @param TreeNode $root
     */
    function distributeCoinsBack($root, &$ans)
    {
        $left = $right = 0;
        if ($root->left) {
            $left = $this->distributeCoinsBack($root->left, $ans);
        }
        if ($root->right) {
            $right = $this->distributeCoinsBack($root->right, $ans);
        }

        $ans       += abs($left) + abs($right);
        $root->val += ($left + $right);

        return $root->val - 1;
    }
}