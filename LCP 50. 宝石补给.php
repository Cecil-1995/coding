<?php

class Solution
{

    /**
     * @param Integer[] $gem
     * @param Integer[][] $operations
     * @return Integer
     */
    function giveGem($gem, $operations)
    {
        foreach ($operations as $operation) {
            $v                  = floor($gem[$operation[0]] / 2);
            $gem[$operation[0]] -= $v;
            $gem[$operation[1]] += $v;
        }

        return max($gem) - min($gem);
    }
}