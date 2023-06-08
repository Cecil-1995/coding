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
    function longestZigZag($root)
    {
        if (!$root) {
            return 0;
        }

        return max($this->longestZigZag2($root->left, 'left', 0), $this->longestZigZag2($root->right, 'right', 0));
    }

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function longestZigZag2($root, $d, $max)
    {
        if (!$root) {
            return $max;
        }
        ++$max;

        if ($d === 'left') {
            return max(
                $this->longestZigZag2($root->left, 'left', 0), $this->longestZigZag2($root->right, 'right', $max)
            );
        } else {
            return max(
                $this->longestZigZag2($root->left, 'left', $max), $this->longestZigZag2($root->right, 'right', 0)
            );
        }
    }
}