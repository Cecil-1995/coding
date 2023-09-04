<?php
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $neighbors = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->neighbors = array();
 *     }
 * }
 */

class Solution
{
    /**
     * @param Node $node
     * @return Node
     */
    function cloneGraph($node)
    {
        if (!$node) {
            return null;
        }

        $map  = [];
        $list = [$node];
        while ($list) {
            $item = array_shift($list);
            if (!isset($map[$item->val])) {
                $map[$item->val] = new Node($item->val);
            }
            foreach ($item->neighbors as $neighbor) {
                if (!isset($map[$neighbor->val])) {
                    $map[$neighbor->val] = new Node($neighbor->val);
                    array_push($list, $neighbor);
                }
            }
        }

        $list = [$node];
        while ($list) {
            $item = array_shift($list);
            if (empty($map[$item->val]->neighbors)) {
                foreach ($item->neighbors as $neighbor) {
                    array_push($map[$item->val]->neighbors, $map[$neighbor->val]);
                    array_push($list, $neighbor);
                }
            }
        }

        return $map[$node->val];
    }
}