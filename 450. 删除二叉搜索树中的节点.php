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
     * @param Integer $key
     * @return TreeNode
     */
    function deleteNode($root, $key)
    {
        if (!$root) {
            return null;
        }

        if ($root->val > $key) {
            $root->left = $this->deleteNode($root->left, $key);
        } elseif ($root->val < $key) {
            $root->right = $this->deleteNode($root->right, $key);
        } else {
            if ($root->left && $root->right) {
                $min         = $this->getMin($root->right);
                $root->val   = $min->val;
                $root->right = $this->deleteNode($root->right, $min->val);
            } elseif ($root->left) {
                return $root->left;
            } elseif ($root->right) {
                return $root->right;
            } else {
                return null;
            }
        }

        return $root;
    }

    function getMin($root)
    {
        if ($root->left) {
            return $this->getMin($root->left);
        }

        return $root;
    }
}