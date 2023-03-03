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
    public $deep = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root)
    {
        $leftDeep = $rightDeep = 0;

        $this->re($root, $leftDeep, $rightDeep);

        return $this->deep;
    }

    /**
     * @param TreeNode $root
     */
    function re($root, $leftDeep, $rightDeep)
    {
        if ($root->val !== null) {
            $leftDeep  += 1;
            $rightDeep += 1;
        }
        if ($root->left) {
            $this->re($root->left, $leftDeep, $rightDeep);
        }

        if ($root->right) {
            $this->re($root->right, $leftDeep, $rightDeep);
        }

        $this->deep = max($this->deep, $leftDeep, $rightDeep);
    }
}
