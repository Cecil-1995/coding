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
     * @param Integer $targetSum
     * @return Integer
     */
    function pathSum($root, $targetSum)
    {
        if ($root == null) {
            return 0;
        }

        $ret = $this->rootSum($root, $targetSum);
        $ret += $this->pathSum($root->left, $targetSum);
        $ret += $this->pathSum($root->right, $targetSum);

        return $ret;
    }

    /**
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Integer
     */
    function rootSum($root, $targetSum)
    {
        if ($root == null) {
            return 0;
        }

        $ret = 0;
        if ($root->val == $targetSum) {
            ++$ret;
        }

        $ret += $this->rootSum($root->left, $targetSum - $root->val);
        $ret += $this->rootSum($root->right, $targetSum - $root->val);

        return $ret;
    }
}