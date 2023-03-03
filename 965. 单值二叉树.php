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

    public $isUnival = true;
    public $pre      = null;

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isUnivalTree($root)
    {
        if ($root == null) {
            return true;
        }
        $this->pre = $root->val;
        echo $this->isUnival;
        $this->traverse($root);

        return $this->isUnival;
    }

    function traverse($root)
    {
        echo $this->isUnival;
        if ($root == null || !$this->isUnival) {
            return;
        }

        if ($root->val != $this->pre) {
            $this->isUnival = false;

            return;
        }

        $this->traverse($root->left);
        $this->traverse($root->right);
    }
}
