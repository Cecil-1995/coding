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
    public $map = [];

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function rob($root)
    {
        if (!$root) {
            return 0;
        }

        if (isset($this->map[serialize($root)])) {
            return $this->map[serialize($root)];
        }

        // 抢
        $do = 0;
        if (isset($root->left)) {
            $do += $this->rob($root->left->left) + $this->rob($root->left->right);
        }
        if (isset($root->right)) {
            $do += $this->rob($root->right->left) + $this->rob($root->right->right);
        }
        $do += $root->val;

        // 不抢
        $notDo = $this->rob($root->left) + $this->rob($root->right);

        $this->map[serialize($root)] = max($do, $notDo);

        return max($do, $notDo);
    }
}