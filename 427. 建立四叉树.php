<?php
/**
 * Definition for a QuadTree node.
 * class Node {
 *     public $val = null;
 *     public $isLeaf = null;
 *     public $topLeft = null;
 *     public $topRight = null;
 *     public $bottomLeft = null;
 *     public $bottomRight = null;
 *     function __construct($val, $isLeaf) {
 *         $this->val = $val;
 *         $this->isLeaf = $isLeaf;
 *         $this->topLeft = null;
 *         $this->topRight = null;
 *         $this->bottomLeft = null;
 *         $this->bottomRight = null;
 *     }
 * }
 */

class Solution
{
    /**
     * @param Integer[][] $grid
     * @return Node
     */
    function construct($grid)
    {
        $node    = new Node(boolval($grid[0][0]), true);
        $n       = count($grid);
        $topLeft = $topRight = $bottomLeft = $bottomRight = [];

        for ($i = 0; $i < $n; ++$i) {
            for ($j = 0; $j < $n; ++$j) {
                if ($i < $n / 2 && $j < $n / 2) {
                    $topLeft[$i][$j] = $grid[$i][$j];
                } elseif ($i >= $n / 2 && $j < $n / 2) {
                    $bottomLeft[$i - $n / 2][$j] = $grid[$i][$j];
                } elseif ($i < $n / 2 && $j >= $n / 2) {
                    $topRight[$i][$j - $n / 2] = $grid[$i][$j];
                } else {
                    $bottomRight[$i - $n / 2][$j - $n / 2] = $grid[$i][$j];
                }

                if (boolval($grid[$i][$j]) !== $node->val) {
                    $node->isLeaf = false;
                }
            }
        }

        if ($node->isLeaf === false) {
            $node->topLeft     = $this->construct($topLeft);
            $node->topRight    = $this->construct($topRight);
            $node->bottomLeft  = $this->construct($bottomLeft);
            $node->bottomRight = $this->construct($bottomRight);
        }

        return $node;
    }
}