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
class BSTIterator
{
    public $list = [];

    /**
     * @param TreeNode $root
     */
    function __construct($root)
    {
        $this->list = $this->init($root);
    }

    function init($root)
    {
        if (!$root) {
            return [];
        }

        $left  = $this->init($root->left);
        $right = $this->init($root->right);

        return array_merge($left, [$root->val], $right);
    }

    /**
     * @return Integer
     */
    function next()
    {
        return array_shift($this->list);
    }

    /**
     * @return Boolean
     */
    function hasNext()
    {
        return !empty($this->list);
    }
}

class BSTIterator2
{
    public $list = [];

    /**
     * @param TreeNode $root
     */
    function __construct($root)
    {
        while ($root) {
            array_unshift($this->list, $root);
            $root = $root->left;
        }
    }

    /**
     * @return Integer
     */
    function next()
    {
        $node = array_shift($this->list);
        $val  = $node->val;

        $node = $node->right;
        while ($node) {
            array_unshift($this->list, $node);
            $node = $node->left;
        }

        return $val;
    }

    /**
     * @return Boolean
     */
    function hasNext()
    {
        return !empty($this->list);
    }
}

/**
 * Your BSTIterator object will be instantiated and called as such:
 * $obj = BSTIterator($root);
 * $ret_1 = $obj->next();
 * $ret_2 = $obj->hasNext();
 */