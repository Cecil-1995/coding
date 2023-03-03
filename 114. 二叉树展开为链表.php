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
     * @return NULL
     */
    function flatten($root)
    {
        if (!$root) {
            return $root;
        }

        $this->flatten($root->left);
        $this->flatten($root->right);

        $left  = $root->left;
        $right = $root->right;

        $root->left  = null;
        $root->right = $left;

        $p = $root;
        while ($p->right) {
            $p = $p->right;
        }

        $p->right = $right;

        return $root;
    }
}