<?php
/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */

class Solution
{
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root)
    {
        $this->traverse($root->left, $root->right);

        return $root;
    }

    public function traverse($node1, $node2)
    {
        if (!$node1 || !$node2) {
            return;
        }
        $node1->next = $node2;
        $this->traverse($node1->left, $node1->right);
        $this->traverse($node2->left, $node2->right);
        $this->traverse($node1->right, $node2->left);
    }
}