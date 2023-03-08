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
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums)
    {
        $count = count($nums);
        if ($count === 0) {
            return null;
        }

        $node        = new TreeNode($nums[floor($count / 2)]);
        $node->left  = $this->sortedArrayToBST(array_slice($nums, 0, floor($count / 2)));
        $node->right = $this->sortedArrayToBST(array_slice($nums, floor($count / 2) + 1));

        return $node;
    }
}