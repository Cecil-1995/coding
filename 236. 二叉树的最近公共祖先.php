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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q)
    {
        if (!$root) {
            return null;
        }
        if ($p === $root || $q === $root) {
            return $root;
        }
        if ($root->left) {
            $left = $this->lowestCommonAncestor($root->left, $p, $q);
        }
        if ($root->right) {
            $right = $this->lowestCommonAncestor($root->right, $p, $q);
        }

        if (isset($left) && isset($right)) {
            return $root;
        } elseif (isset($left)) {
            return $left;
        } elseif (isset($right)) {
            return $right;
        }

        return null;
    }

}