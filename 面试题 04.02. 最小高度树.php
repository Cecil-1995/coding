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
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums)
    {
        if (count($nums) === 0) {
            return null;
        }
        $left        = 0;
        $right       = count($nums) - 1;
        $middle      = floor($left + ($right - $left) / 2);
        $node        = new TreeNode($nums[$middle]);
        $node->left  = $this->sortedArrayToBST(array_slice($nums, 0, $middle));
        $node->right = $this->sortedArrayToBST(array_slice($nums, $middle + 1));

        return $node;
    }
}