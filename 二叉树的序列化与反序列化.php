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

class Codec
{
    function __construct()
    {

    }

    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root)
    {
        if (!$root) {
            return '';
        }

        $ans   = [];
        $queue = [$root];
        while (!empty($queue)) {
            $item = array_shift($queue);
            if ($item) {
                $queue[] = $item->left;
                $queue[] = $item->right;
                $ans[]   = $item->val;
            } else {
                $ans[] = 'null';
            }
        }

        return implode(',', $ans);
    }

    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data)
    {
        $data = explode(',', $data);
        $data = array_filter($data);

        if (empty($data)) {
            return null;
        }

        $item  = array_shift($data);
        $node  = new TreeNode($item);
        $queue = [$node];
        while (!empty($data)) {
            $root = array_shift($queue);

            $left = array_shift($data);
            if ($left != 'null') {
                $root->left = new TreeNode($left);
                $queue[]    = $root->left;
            }
            $right = array_shift($data);
            if ($right != 'null') {
                $root->right = new TreeNode($right);
                $queue[]     = $root->right;
            }
        }

        return $node;
    }
}

/**
 * Your Codec object will be instantiated and called as such:
 * $ser = Codec();
 * $deser = Codec();
 * $data = $ser->serialize($root);
 * $ans = $deser->deserialize($data);
 */