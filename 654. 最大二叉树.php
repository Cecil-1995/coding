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
    function constructMaximumBinaryTree($nums)
    {
        if (empty($nums)) {
            return null;
        }

        $left = $right = [];
        $max  = 0;

        foreach ($nums as $num) {
            if ($max <= $num) {
                $max = $num;
            }
        }
        $flag = false;
        foreach ($nums as $num) {
            if ($num === $max) {
                $flag = true;
                continue;
            }
            if ($flag) {
                $right[] = $num;
            } else {
                $left[] = $num;
            }
        }

        return new TreeNode($max, $this->constructMaximumBinaryTree($left), $this->constructMaximumBinaryTree($right));
    }
}