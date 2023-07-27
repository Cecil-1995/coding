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
    function countNodes($root)
    {
        if (!$root) {
            return 0;
        }

        $hl = 1;
        $l  = $root->left;
        $hr = 1;
        $r  = $root->right;
        while ($l) {
            ++$hl;
            $l = $l->left;
        }
        while ($r) {
            ++$hr;
            $r = $r->right;
        }

        if ($hl === $hr) {
            // 满二叉树
            return pow(2, $hl) - 1;
        } else {
            return 1 + $this->countNodes($root->left) + $this->countNodes($root->right);
        }
    }


}