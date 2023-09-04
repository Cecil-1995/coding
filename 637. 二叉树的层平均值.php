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
     * @return Float[]
     */
    function averageOfLevels($root)
    {
        if (!$root) {
            return [];
        }

        $ans  = [];
        $list = [$root];
        while ($list) {
            $count = count($list);
            $sum   = 0;
            for ($i = 0; $i < $count; ++$i) {
                $item = array_shift($list);
                if ($item->left) {
                    $list[] = $item->left;
                }
                if ($item->right) {
                    $list[] = $item->right;
                }
                $sum += $item->val;
            }
            $ans[] = $sum / $count;
        }

        return $ans;
    }
}