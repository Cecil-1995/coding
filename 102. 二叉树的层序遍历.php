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
    public $result = [];

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        $this->tree($root, 0);

        return $this->result;
    }

    function tree($root, $deep)
    {
        if (!$root) {
            return;
        }

        $this->result[$deep][] = $root->val;
        if ($root->left) {
            $this->tree($root->left, $deep + 1);
        }
        if ($root->right) {
            $this->tree($root->right, $deep + 1);
        }
    }
}