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
     * @return Integer[][]
     */
    function zigzagLevelOrder($root)
    {
        if (!$root) {
            return [];
        }

        $result = [];
        $flag   = true;
        $list   = [$root];

        while (!empty($list)) {
            $tempList   = [];
            $tempResult = [];
            foreach ($list as $item) {
                if ($item->left) {
                    $tempList[] = $item->left;
                }
                if ($item->right) {
                    $tempList[] = $item->right;
                }
                if ($flag) {
                    // 从左往右
                    $tempResult[] = $item->val;
                } else {
                    // 从右往左
                    array_unshift($tempResult, $item->val);
                }
            }
            $flag     = !$flag;
            $list     = $tempList;
            $result[] = $tempResult;
        }

        return $result;
    }
}