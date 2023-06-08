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
     * @return Integer
     */
    function maxLevelSum($root)
    {
        $max   = $root->val;
        $index = 1;
        $list  = [$root];
        $i     = 0;
        while (!empty($list)) {
            ++$i;
            $temp = $list;

            $list    = [];
            $tempMax = 0;
            foreach ($temp as $item) {
                if ($item->left) {
                    $list[] = $item->left;
                }
                if ($item->right) {
                    $list[] = $item->right;
                }
                $tempMax += $item->val;
            }
            if ($tempMax > $max) {
                $max   = $tempMax;
                $index = $i;
            }
        }

        return $index;
    }
}