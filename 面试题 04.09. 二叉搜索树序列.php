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
     * @param TreeNode $root
     * @return Integer[][]
     */
    function BSTSequences($root)
    {
        if (!$root) {
            return [[]];
        }

        $left = $right = null;
        if ($root->left) {
            $left = $this->BSTSequences($root->left);
        }
        if ($root->right) {
            $right = $this->BSTSequences($root->right);
        }

        $ans = [];
        if ($left && $right) {
            foreach ($left as $l) {
                foreach ($right as $r) {
                    $this->helper($ans, [$root->val], $l, $r);
                }
            }
        } elseif ($left) {
            foreach ($left as $l) {
                $ans[] = array_merge([$root->val], $l);
            }
        } elseif ($right) {
            foreach ($right as $r) {
                $ans[] = array_merge([$root->val], $r);
            }
        } else {
            $ans[] = [$root->val];
        }

        return $ans;
    }

    function helper(&$ans, $res, $arr1, $arr2)
    {
        if (!$arr1 && !$arr2) {
            $ans[] = $res;
        } elseif (!$arr1) {
            $ans[] = array_merge($res, $arr2);
        } elseif (!$arr2) {
            $ans[] = array_merge($res, $arr1);
        } else {
            $tempRes  = $res;
            $tempArr1 = $arr1;
            $tempArr2 = $arr2;
            $res[]    = array_shift($arr1);
            $this->helper($ans, $res, $arr1, $arr2);

            $tempRes[] = array_shift($tempArr2);
            $this->helper($ans, $tempRes, $tempArr1, $tempArr2);
        }
    }

}