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
     * @return Integer[]
     */
    function rightSideView($root)
    {
        if (!$root) {
            return [];
        }

        $result = [];
        $list   = [$root];
        while (!empty($list)) {
            $temp = $list;

            $list = [];
            foreach ($temp as $item) {
                if ($item->left) {
                    $list[] = $item->left;
                }
                if ($item->right) {
                    $list[] = $item->right;
                }
            }

            $result[] = array_pop($temp)->val;
        }

        return $result;
    }
}