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
     * @param Integer $sum
     * @return Integer
     */
    function pathSum($root, $sum)
    {
        if (!$root) {
            return 0;
        }

        $ans = 0;
        $this->helper($root, $sum, $ans);

        $ans += $this->pathSum($root->left, $sum) + $this->pathSum($root->right, $sum);

        return $ans;
    }

    function helper($root, $sum, &$ans)
    {
        if (!$root) {
            return;
        }
        $sum -= $root->val;
        if ($sum === 0) {
            ++$ans;
        }

        if ($root->left) {
            $this->helper($root->left, $sum, $ans);
        }
        if ($root->right) {
            $this->helper($root->right, $sum, $ans);
        }
    }

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Integer
     */
    function pathSum2($root, $sum)
    {
        $map[0] = 1;

        return $this->dfs($root, 0, $sum, $map);
    }

    function dfs($root, $cur, $sum, &$map)
    {
        if (!$root) {
            return 0;
        }

        $cur       += $root->val;
        $ret       = $map[$cur - $sum] ?? 0;
        $map[$cur] = isset($map[$cur]) ? $map[$cur] + 1 : 1;
        $ret       += $this->dfs($root->left, $cur, $sum, $map);
        $ret       += $this->dfs($root->right, $cur, $sum, $map);
        --$map[$cur];

        return $ret;
    }
}