<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function convertBiNode($root)
    {
        if (!$root) {
            return null;
        }

        return $this->helper($root);
    }

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function helper($root)
    {
        if (!$root->left && !$root->right) {
            return $root;
        }

        $left = null;
        if ($root->left) {
            $left = $this->helper($root->left);
        }
        $right = null;
        if ($root->right) {
            $right = $this->helper($root->right);
        }
        $root->right = $right;

        if ($left) {
            $root->left = null;
            $node       = $left;
            while ($node->right) {
                $node = $node->right;
            }
            $node->right = $root;

            return $left;
        } else {
            return $root;
        }
    }
}