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
     * @return Integer[]
     */
    function postorderTraversal($root)
    {
        $this->traver($root);

        return $this->result;
    }

    function traver($root)
    {
        if ($root->left) {
            $this->traver($root->left);
        }
        if ($root->right) {
            $this->traver($root->right);
        }
        $this->result[] = $root->val;
    }
}