<?php
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $next = null;
 *     public $random = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->next = null;
 *         $this->random = null;
 *     }
 * }
 */

class Solution
{
    /**
     * @param Node $head
     * @return Node
     */
    function copyRandomList($head)
    {
        $map = [];

        for ($p = $head; $p !== null; $p = $p->next) {
            $map[serialize($p)] = new Node($p->val);
        }

        for ($p = $head; $p !== null; $p = $p->next) {
            if ($p->next) {
                $map[serialize($p)]->next = $map[serialize($p->next)];
            }
            if ($p->random) {
                $map[serialize($p)]->random = $map[serialize($p->random)];
            }
        }

        return $map[serialize($head)];
    }
}