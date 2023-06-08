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
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Boolean
     */
    function leafSimilar($root1, $root2)
    {
        $leaf1 = [];
        $leaf2 = [];
        $this->getLeaf($root1, $leaf1);
        $this->getLeaf($root2, $leaf2);

        if (count($leaf1) !== count($leaf2)) {
            return false;
        }
        foreach ($leaf1 as $i => $item) {
            if ($item !== $leaf2[$i]) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param TreeNode $root
     */
    function getLeaf($root, &$leaf)
    {
        if ($root->left) {
            $this->getLeaf($root->left, $leaf);
        }
        if (!$root->left && !$root->right) {
            $leaf[] = $root->val;
        }
        if ($root->right) {
            $this->getLeaf($root->right, $leaf);
        }
    }
}