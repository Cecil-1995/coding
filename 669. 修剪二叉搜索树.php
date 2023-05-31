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
     * @param Integer $low
     * @param Integer $high
     * @return TreeNode
     */
    function trimBST($root, $low, $high)
    {
        if ($root->left) {
            $left = $this->trimBST($root->left, $low, $high);
        } else {
            $left = null;
        }

        if ($root->right) {
            $right = $this->trimBST($root->right, $low, $high);
        } else {
            $right = null;
        }

        if ($root->val >= $low && $root->val <= $high) {
            $root->left  = $left;
            $root->right = $right;

            return $root;
        } elseif ($root->val < $low) {
            return $right;
        } else {
            return $left;
        }
    }

}