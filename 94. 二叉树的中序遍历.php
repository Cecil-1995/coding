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
    function inorderTraversal($root)
    {
        $result = [];
        $this->print($root, $result);

        return $result;
    }

    function print($root, &$result)
    {
        if (!$root) {
            return;
        }
        if ($root->left !== null) {
            // 左节点
            $this->print($root->left, $result);
        }
        // 输出
        $result[] = $root->val;
        if ($root->right !== null) {
            // 右节点
            $this->print($root->right, $result);
        }
    }
}