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
     * @return TreeNode
     */
    function increasingBST($root)
    {
        $target = new TreeNode();

        return $target;
    }

    /**
     * @param TreeNode $root
     * @param TreeNode $target
     */
    function mid($root, $target)
    {
        if ($root == null) {
            return;
        }
        $this->mid($root->left, $target);

        $node = new TreeNode($root->val);

        $target->val = $root->val;
        $target->left = null;


        $this->mid($root->right);
    }
}
