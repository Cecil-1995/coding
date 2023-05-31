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
    function findSecondMinimumValue($root)
    {







        if (!$root) {
            return -1;
        }

        if ($root->left) {
            $left = $this->findSecondMinimumValue($root->left);
        } else {
            $left = -1;
        }

        if ($root->right) {
            $right = $this->findSecondMinimumValue($root->right);
        } else {
            $right = -1;
        }

        if ($left != -1 && $right != -1) {

        }




        if (!$root) {
            return -1;
        }

        if ($root->left->val != $root->right->val) {
            if ($root->val == $root->left->val) {
                return $root->right->val;
            } else {
                return $root->left->val;
            }
        } else {
            $left = $this->findSecondMinimumValue($root->left);
            $right = $this->findSecondMinimumValue($root->right);
            if ($left != -1 && $right != -1) {
                return min($left, $right);
            } elseif ($left != -1) {
                return $left;
            } else {
                return $right;
            }
        }

    }
}