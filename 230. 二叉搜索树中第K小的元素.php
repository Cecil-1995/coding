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
    public $result = 0;
    public $index  = 0;

    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($root, $k)
    {
        $this->travers($root, $k);

        return $this->result;
    }

    /**
     * @param TreeNode $root
     * @param Integer $k
     */
    function travers($root, $k)
    {
        if (!$root) {
            return null;
        }

        $this->travers($root->left, $k);

        ++$this->index;
        if ($this->index === $k) {
            $this->result = $root->val;

            return;
        }

        $this->travers($root->right, $k);
    }
}