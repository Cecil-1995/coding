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
     * @param TreeNode $t1
     * @param TreeNode $t2
     * @return Boolean
     */
    function checkSubTree($t1, $t2)
    {
        return $this->helper($t1, $t2, true);
    }

    /**
     * @param TreeNode $t1
     * @param TreeNode $t2
     * @param bool $isRoot
     * @return Boolean
     */
    function helper($t1, $t2, $isRoot)
    {
        if (!$t1 && !$t2) {
            return true;
        } elseif ($t1 && $t2) {
            if ($t1->val === $t2->val && $this->helper($t1->left, $t2->left, false) && $this->helper(
                    $t1->right, $t2->right, false
                )) {
                return true;
            }
            if (!$isRoot) {
                return false;
            }

            return $this->helper($t1->left, $t2, true) || $this->helper($t1->right, $t2, true);
        } else {
            return false;
        }
    }

}