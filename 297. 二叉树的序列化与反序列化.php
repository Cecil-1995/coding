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
        $ans = '';

        $serialize = function ($root, $fun, &$ans){
            if (!$root) {
                $ans .= ',';

                return;
            }

            $ans .= $root->val . '#';
            $fun($root->left, $fun, $ans);
            $fun($root->right, $fun, $ans);
        };

        $serialize($root, $serialize, $ans);

        return $ans;
    }

    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data)
    {
        $deserialize = function (&$data, $func){
            if (empty($data)) {
                return null;
            }

            if ($data[0] === ',') {
                $data = substr($data, 1);

                return null;
            }

            $index       = strpos($data, '#');
            $val         = intval(substr($data, 0, $index));
            $data        = substr($data, $index + 1);
            $node        = new TreeNode($val);
            $node->left  = $func($data, $func);
            $node->right = $func($data, $func);

            return $node;
        };

        return $deserialize($data, $deserialize);
    }
}

/**
 * Your Codec object will be instantiated and called as such:
 * $ser = Codec();
 * $deser = Codec();
 * $data = $ser->serialize($root);
 * $ans = $deser->deserialize($data);
 */