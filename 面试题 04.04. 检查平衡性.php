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
    function isBalanced($root)
    {
        if (!$root) {
            return true;
        }

        return $this->maxDeep($root)[0];
    }

    /**
     * @param TreeNode $root
     */
    function maxDeep($root)
    {
        $left      = 0;
        $leftFlag  = true;
        $right     = 0;
        $rightFlag = true;
        if ($root->left) {
            list($leftFlag, $left) = $this->maxDeep($root->left);
        }
        if (!$leftFlag) {
            return [false, 0];
        }
        if ($root->right) {
            list($rightFlag, $right) = $this->maxDeep($root->right);
        }
        if (!$rightFlag) {
            return [false, 0];
        }

        if (abs($left - $right) > 1) {
            return [false, 0];
        }

        return [true, max($left, $right) + 1];
    }
}