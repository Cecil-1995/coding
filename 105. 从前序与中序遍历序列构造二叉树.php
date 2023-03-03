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
    public $current = 0;

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder)
    {
        $root = new TreeNode();

        $left  = [];
        $right = [];
        $flag  = false;
        foreach ($inorder as $it) {
            if ($preorder[$this->current] === $it) {
                $flag = true;
                continue;
            }
            if ($flag) {
                $right[] = $it;
            } else {
                $left[] = $it;
            }
        }

        $root->val = $preorder[$this->current++];
        if (!empty($left)) {
            $root->left = $this->buildTree($preorder, $left);
        }
        if (!empty($right)) {
            $root->right = $this->buildTree($preorder, $right);
        }

        return $root;
    }
}