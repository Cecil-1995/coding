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
        if (!$root) {
            return $root;
        }

        $pq = [$root];
        while ($pq) {
            $list       = $pq;
            $pq         = [];
            $item       = array_pop($list);
            $item->next = null;
            if ($item->right) {
                array_unshift($pq, $item->right);
            }
            if ($item->left) {
                array_unshift($pq, $item->left);
            }

            while ($list) {
                $item2       = array_pop($list);
                $item2->next = $item;
                $item        = $item2;
                if ($item->right) {
                    array_unshift($pq, $item->right);
                }
                if ($item->left) {
                    array_unshift($pq, $item->left);
                }
            }
        }

        return $root;
    }
}