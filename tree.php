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
    function preorderTraversal($root)
    {
        $result = [];
        $fun    = function ($root) use (&$result, &$fun){
            if (!$root) {
                return;
            }
            $fun($root->left);
            $result[] = $root->val;
            $fun($root->right);
        };

        $fun($root);

        return $result;
    }

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        if (!$root) {
            return [];
        }

        $result = [];
        $queue  = [$root];
        while (!empty($queue)) {
            $tempResult = [];
            $tempQueue  = $queue;
            $queue      = [];

            while (!empty($tempQueue)) {
                $item         = array_shift($tempQueue);
                $tempResult[] = $item->val;
                if ($item->left) {
                    $queue[] = $item->left;
                }
                if ($item->right) {
                    $queue[] = $item->right;
                }
            }
            $result[] = $tempResult;
        }

        return $result;
    }

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root)
    {
        if (!$root) {
            return 0;
        }

        return 1 + max($this->maxDepth($root->left), $this->maxDepth($root->right));
    }

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root)
    {
        if (!$root) {
            return true;
        }

        $left = $right = [];
        $this->order($root->left, $left);
        $this->order($root->right, $right, false);

        return $left === $right;
    }

    function order($root, &$result, $isLeft = true)
    {
        if (!$root) {
            return;
        }
        if ($isLeft) {
            $this->order($root->left, $result);
            $result[] = $root->val;
            $this->order($root->right, $result);
        } else {
            $this->order($root->right, $result, false);
            $result[] = $root->val;
            $this->order($root->left, $result, false);
        }
    }

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric2($root)
    {
        if (!$root) {
            return true;
        }

        return $this->check($root->left, $root->right);
    }

    /**
     * @param TreeNode $left
     * @param TreeNode $right
     * @return Boolean
     */
    function check($left, $right)
    {
        if ($left && $right) {
            if ($left->val !== $right->val) {
                return false;
            } else {
                return $this->check($left->left, $right->right) && $this->check($left->right, $right->left);
            }
        } elseif ($left || $right) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param TreeNode $root
     * @param Integer $targetSum
     * @return Boolean
     */
    function hasPathSum($root, $targetSum)
    {
        if (!$root) {
            return false;
        }

        if (!$root->left && !$root->right) {
            if ($root->val === $targetSum) {
                return true;
            } else {
                return false;
            }
        } else {
            $left  = $root->left && $this->hasPathSum($root->left, $targetSum - $root->val);
            $right = $root->right && $this->hasPathSum($root->right, $targetSum - $root->val);

            return $left || $right;
        }
    }

    /**
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder)
    {
        if (empty($postorder) || empty($inorder)) {
            return null;
        }

        $tree          = new TreeNode(array_pop($postorder));
        $inorderLeft   = $inorderRight = [];
        $postorderLeft = $postorderRight = [];
        $flag          = true;
        foreach ($inorder as $item) {
            if ($item === $tree->val) {
                $flag = false;
                continue;
            }
            if ($flag) {
                $inorderLeft[] = $item;
            } else {
                $inorderRight[] = $item;
            }
        }
        foreach ($postorder as $item) {
            if (in_array($item, $inorderLeft)) {
                $postorderLeft[] = $item;
            } else {
                $postorderRight[] = $item;
            }
        }
        $tree->right = $this->buildTree($inorderRight, $postorderRight);
        $tree->left  = $this->buildTree($inorderLeft, $postorderLeft);

        return $tree;
    }

    public $inorderMap = [];

    /**
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree2($preorder, $inorder)
    {
        $this->inorderMap = array_flip($inorder);

        return $this->helper($preorder, $inorder, 0, 0, count($inorder));
    }

    function helper($preorder, $inorder, $preorderStart, $inorderStart, $len)
    {
        if ($len === 0) {
            return null;
        }

        $tree        = new TreeNode($preorder[$preorderStart]);
        $index       = $this->inorderMap[$tree->val];
        $currentLen  = $index - $inorderStart;
        $tree->left  = $this->helper($preorder, $inorder, $preorderStart + 1, $inorderStart, $currentLen);
        $tree->right = $this->helper($preorder, $inorder, $preorderStart + 1 + $currentLen, $index + 1, $currentLen);

        return $tree;
    }
}
