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
    function sumNumbers($root)
    {
        $ans = 0;
        $this->dfs($root, '', $ans);

        return $ans;
    }

    function dfs($root, $sum, &$ans)
    {
        if (!$root->left && !$root->right) {
            $ans += intval($sum . $root->val);

            return;
        }

        if ($root->left) {
            $this->dfs($root->left, $sum . $root->val, $ans);
        }
        if ($root->right) {
            $this->dfs($root->right, $sum . $root->val, $ans);
        }

        return;
    }
}