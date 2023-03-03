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
    public $sum = 0;

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function convertBST($root)
    {
        if (!$root) {
            return $root;
        }

        $node = new TreeNode();
        // 右子树
        if (isset($root->right)) {
            $right = $this->convertBST($root->right);
        }

        // 当前值
        $node->val = $this->sum + $root->val;
        $this->sum += $root->val;

        // 左子树
        if (isset($root->left)) {
            $left = $this->convertBST($root->left);
        }

        $node->left  = $left ?? null;
        $node->right = $right ?? null;

        return $node;
    }
}